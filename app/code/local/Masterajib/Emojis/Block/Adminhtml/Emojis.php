<?php
class Masterajib_Emojis_Block_Adminhtml_Emojis extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_emojis';
    $this->_blockGroup = 'emojis';
    $this->_headerText = Mage::helper('emojis')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('emojis')->__('Add Item');
    parent::__construct();
  }
}