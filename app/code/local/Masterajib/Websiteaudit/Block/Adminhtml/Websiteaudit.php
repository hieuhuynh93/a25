<?php
class Masterajib_Websiteaudit_Block_Adminhtml_Websiteaudit extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_websiteaudit';
    $this->_blockGroup = 'websiteaudit';
    $this->_headerText = Mage::helper('websiteaudit')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('websiteaudit')->__('Add Item');
    parent::__construct();
  }
}