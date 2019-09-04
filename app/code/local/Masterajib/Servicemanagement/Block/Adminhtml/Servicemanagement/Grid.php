<?php

class Masterajib_Servicemanagement_Block_Adminhtml_Servicemanagement_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('servicemanagementGrid');
      $this->setDefaultSort('servicemanagement_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('servicemanagement/servicemanagement')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('servicemanagement_id', array(
          'header'    => Mage::helper('servicemanagement')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'servicemanagement_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('servicemanagement')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('servicemanagement')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('servicemanagement')->__('Status'),
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
                'header'    =>  Mage::helper('servicemanagement')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('servicemanagement')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('servicemanagement')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('servicemanagement')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('servicemanagement_id');
        $this->getMassactionBlock()->setFormFieldName('servicemanagement');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('servicemanagement')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('servicemanagement')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('servicemanagement/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('servicemanagement')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('servicemanagement')->__('Status'),
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