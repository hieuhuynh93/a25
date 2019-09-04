<?php
class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_pagebuilder';
    $this->_blockGroup = 'pagebuilder';
    $this->_headerText = Mage::helper('pagebuilder')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('pagebuilder')->__('Add Item');
    parent::__construct();
  }
}