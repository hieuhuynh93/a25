<?php

class Masterajib_Smallseotools_Block_Adminhtml_Smallseotools_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('smallseotoolsGrid');
      $this->setDefaultSort('smallseotools_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('smallseotools/smallseotools')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('smallseotools_id', array(
          'header'    => Mage::helper('smallseotools')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'smallseotools_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('smallseotools')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));
      
      $this->addColumn('positionIndex', array(
          'header'    => Mage::helper('smallseotools')->__('Position'),
          'align'     =>'left',
          'index'     => 'positionIndex',
      ));

      $this->addColumn('content', array(
			'header'    => Mage::helper('smallseotools')->__('Item Content'),
			'width'     => '100px',
			'index'     => 'content',
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('smallseotools')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('smallseotools')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('smallseotools')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('smallseotools')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('smallseotools')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('smallseotools_id');
        $this->getMassactionBlock()->setFormFieldName('smallseotools');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('smallseotools')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('smallseotools')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('smallseotools/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('smallseotools')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('smallseotools')->__('Status'),
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