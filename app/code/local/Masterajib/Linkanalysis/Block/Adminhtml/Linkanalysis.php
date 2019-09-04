<?php
class Masterajib_Linkanalysis_Block_Adminhtml_Linkanalysis extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_linkanalysis';
    $this->_blockGroup = 'linkanalysis';
    $this->_headerText = Mage::helper('linkanalysis')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('linkanalysis')->__('Add Item');
    parent::__construct();
  }
}