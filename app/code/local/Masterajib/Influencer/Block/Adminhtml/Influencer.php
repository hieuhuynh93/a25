<?php
class Masterajib_Influencer_Block_Adminhtml_Influencer extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_influencer';
    $this->_blockGroup = 'influencer';
    $this->_headerText = Mage::helper('influencer')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('influencer')->__('Add Item');
    parent::__construct();
  }
}