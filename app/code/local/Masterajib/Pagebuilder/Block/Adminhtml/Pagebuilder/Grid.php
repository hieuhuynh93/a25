<?php

class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('pagebuilderGrid');
      $this->setDefaultSort('pagebuilder_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('pagebuilder/pagebuilder')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('pagebuilder_id', array(
          'header'    => Mage::helper('pagebuilder')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'pagebuilder_id',
      ));
      
      $this->addColumn('filename', array(
            'header' => Mage::helper('catalog')->__('Image'),
            'align' => 'left',
            'width' => '70',
            'renderer' => 'Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Grid_Renderer_Image'
        ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('pagebuilder')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('pagebuilder')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
      
      //------------------------------------
      $this->addColumn('template_type', array(
          'header'    => Mage::helper('pagebuilder')->__('Template Type'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'template_type',
          'type'      => 'options',
          'options'   => array(
              1 => 'All',
              2 => 'Lead Generation',
              3 => 'Two-Step',
              4 => 'Click-Through',
              5 => 'Thank You',
              6 => 'E-book',
              7 => 'Event',
              8 => 'App',
          ),
      ));
      //-----------------------------------
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('pagebuilder')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('pagebuilder')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('pagebuilder')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('pagebuilder')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('pagebuilder_id');
        $this->getMassactionBlock()->setFormFieldName('pagebuilder');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('pagebuilder')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('pagebuilder')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('pagebuilder/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('pagebuilder')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('pagebuilder')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}