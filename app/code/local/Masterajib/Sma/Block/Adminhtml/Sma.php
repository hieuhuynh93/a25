<?php
class Masterajib_Sma_Block_Adminhtml_Sma extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_sma';
    $this->_blockGroup = 'sma';
    $this->_headerText = Mage::helper('sma')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('sma')->__('Add Item');
    parent::__construct();
  }
}