<?php
class Masterajib_Filemanager_Block_Adminhtml_Filemanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_filemanager';
    $this->_blockGroup = 'filemanager';
    $this->_headerText = Mage::helper('filemanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('filemanager')->__('Add Item');
    parent::__construct();
  }
}