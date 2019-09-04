<?php
class Masterajib_Caption_Block_Adminhtml_Caption extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_caption';
    $this->_blockGroup = 'caption';
    $this->_headerText = Mage::helper('caption')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('caption')->__('Add Item');
    parent::__construct();
  }
}