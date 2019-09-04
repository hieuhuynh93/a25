<?php

class Masterajib_Schedulepost_Block_Adminhtml_Schedulepost_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('schedulepostGrid');
      $this->setDefaultSort('schedulepost_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('schedulepost/schedulepost')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('schedulepost_id', array(
          'header'    => Mage::helper('schedulepost')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'schedulepost_id',
      ));

      $this->addColumn('bulkposting_id', array(
          'header'    => Mage::helper('schedulepost')->__('Bulkpost Id'),
          'align'     =>'left',
          'index'     => 'bulkposting_id',
      ));
      
      $this->addColumn('customer_id', array(
          'header'    => Mage::helper('schedulepost')->__('Customer Id'),
          'align'     =>'left',
          'index'     => 'customer_id',
      ));
      
      $this->addColumn('influencerusers_id', array(
          'header'    => Mage::helper('schedulepost')->__('Influencer User Id'),
          'align'     =>'left',
          'index'     => 'influencerusers_id',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('schedulepost')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('schedulepost')->__('Status'),
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
                'header'    =>  Mage::helper('schedulepost')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('schedulepost')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('schedulepost')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('schedulepost')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('schedulepost_id');
        $this->getMassactionBlock()->setFormFieldName('schedulepost');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('schedulepost')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('schedulepost')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('schedulepost/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('schedulepost')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('schedulepost')->__('Status'),
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