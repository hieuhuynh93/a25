<?php
class Masterajib_Bulkposting_Block_Adminhtml_Bulkposting extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_bulkposting';
    $this->_blockGroup = 'bulkposting';
    $this->_headerText = Mage::helper('bulkposting')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('bulkposting')->__('Add Item');
    parent::__construct();
  }
}