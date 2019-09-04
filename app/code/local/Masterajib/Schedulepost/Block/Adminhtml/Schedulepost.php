<?php
class Masterajib_Schedulepost_Block_Adminhtml_Schedulepost extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_schedulepost';
    $this->_blockGroup = 'schedulepost';
    $this->_headerText = Mage::helper('schedulepost')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('schedulepost')->__('Add Item');
    parent::__construct();
  }
}