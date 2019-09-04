<?php

class Masterajib_Influencerusers_Block_Adminhtml_Influencerusers_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('influencerusersGrid');
      $this->setDefaultSort('influencerusers_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('influencerusers/influencerusers')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('influencerusers_id', array(
          'header'    => Mage::helper('influencerusers')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'influencerusers_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('influencerusers')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('influencerusers')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('influencerusers')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
      
      $this->addColumn('platform', array(
          'header'    => Mage::helper('influencerusers')->__('Platform'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'platform',
          'type'      => 'options',
          'options'   => array(
              1 => 'Facebook',
              2 => 'Instagram',
              3 => 'Twitter',
          ),
      ));
      
      $this->addColumn('user_type', array(
          'header'    => Mage::helper('influencerusers')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'user_type',
          'type'      => 'options',
          'options'   => array(
              1 => 'Normal User',
              2 => 'Influencer',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('influencerusers')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('influencerusers')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('influencerusers')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('influencerusers')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('influencerusers_id');
        $this->getMassactionBlock()->setFormFieldName('influencerusers');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('influencerusers')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('influencerusers')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('influencerusers/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('influencerusers')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('influencerusers')->__('Status'),
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