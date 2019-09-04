<?php
class Masterajib_Influencerusers_Block_Adminhtml_Influencerusers extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_influencerusers';
    $this->_blockGroup = 'influencerusers';
    $this->_headerText = Mage::helper('influencerusers')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('influencerusers')->__('Add Item');
    parent::__construct();
  }
}