<?php
class Masterajib_Smallseotools_Block_Adminhtml_Smallseotools extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_smallseotools';
    $this->_blockGroup = 'smallseotools';
    $this->_headerText = Mage::helper('smallseotools')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('smallseotools')->__('Add Item');
    parent::__construct();
  }
}