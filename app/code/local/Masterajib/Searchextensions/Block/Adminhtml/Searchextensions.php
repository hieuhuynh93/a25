<?php
class Masterajib_Searchextensions_Block_Adminhtml_Searchextensions extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_searchextensions';
    $this->_blockGroup = 'searchextensions';
    $this->_headerText = Mage::helper('searchextensions')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('searchextensions')->__('Add Item');
    parent::__construct();
  }
}