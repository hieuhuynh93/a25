<?php
class Masterajib_Accountactivity_Block_Adminhtml_Accountactivity extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_accountactivity';
    $this->_blockGroup = 'accountactivity';
    $this->_headerText = Mage::helper('accountactivity')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('accountactivity')->__('Add Item');
    parent::__construct();
  }
}