<?php

class Masterajib_Linkanalysis_Block_Adminhtml_Linkanalysis_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('linkanalysisGrid');
      $this->setDefaultSort('linkanalysis_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('linkanalysis/linkanalysis')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('linkanalysis_id', array(
          'header'    => Mage::helper('linkanalysis')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'linkanalysis_id',
      ));

      $this->addColumn('url', array(
          'header'    => Mage::helper('linkanalysis')->__('URL'),
          'align'     =>'left',
          'index'     => 'url',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('linkanalysis')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('url_type', array(
          'header'    => Mage::helper('linkanalysis')->__('URL Type'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'url_type',
          'type'      => 'options',
          'options'   => array(
              1 => 'Primary Domain',
              2 => 'Internal Link',
              3 => 'External Link',
          ),
      ));
      
      $this->addColumn('status', array(
          'header'    => Mage::helper('linkanalysis')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Processsing',
              2 => 'Completed',
              3 => 'Not Started',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('linkanalysis')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('linkanalysis')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('linkanalysis')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('linkanalysis')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('linkanalysis_id');
        $this->getMassactionBlock()->setFormFieldName('linkanalysis');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('linkanalysis')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('linkanalysis')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('linkanalysis/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('linkanalysis')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('linkanalysis')->__('Status'),
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