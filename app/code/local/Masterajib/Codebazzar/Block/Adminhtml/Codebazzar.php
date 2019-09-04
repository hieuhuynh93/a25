<?php
class Masterajib_Codebazzar_Block_Adminhtml_Codebazzar extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_codebazzar';
    $this->_blockGroup = 'codebazzar';
    $this->_headerText = Mage::helper('codebazzar')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('codebazzar')->__('Add Item');
    parent::__construct();
  }
}