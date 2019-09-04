<?php
class Masterajib_Servicemanagement_Block_Adminhtml_Servicemanagement extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_servicemanagement';
    $this->_blockGroup = 'servicemanagement';
    $this->_headerText = Mage::helper('servicemanagement')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('servicemanagement')->__('Add Item');
    parent::__construct();
  }
}