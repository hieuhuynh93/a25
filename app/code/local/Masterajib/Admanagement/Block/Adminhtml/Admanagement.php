<?php
class Masterajib_Admanagement_Block_Adminhtml_Admanagement extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_admanagement';
    $this->_blockGroup = 'admanagement';
    $this->_headerText = Mage::helper('admanagement')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('admanagement')->__('Add Item');
    parent::__construct();
  }
}