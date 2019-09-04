<?php
class Masterajib_Keywords_Block_Adminhtml_Keywords extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_keywords';
    $this->_blockGroup = 'keywords';
    $this->_headerText = Mage::helper('keywords')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('keywords')->__('Add Item');
    parent::__construct();
  }
}