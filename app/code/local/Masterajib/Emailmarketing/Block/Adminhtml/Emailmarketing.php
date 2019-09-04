<?php
class Masterajib_Emailmarketing_Block_Adminhtml_Emailmarketing extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_emailmarketing';
    $this->_blockGroup = 'emailmarketing';
    $this->_headerText = Mage::helper('emailmarketing')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('emailmarketing')->__('Add Item');
    parent::__construct();
  }
}