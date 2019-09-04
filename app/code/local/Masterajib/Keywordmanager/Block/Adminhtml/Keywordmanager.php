<?php
class Masterajib_Keywordmanager_Block_Adminhtml_Keywordmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_keywordmanager';
    $this->_blockGroup = 'keywordmanager';
    $this->_headerText = Mage::helper('keywordmanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('keywordmanager')->__('Add Item');
    parent::__construct();
  }
}