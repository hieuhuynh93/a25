<?php
class Masterajib_Graph_Block_Adminhtml_Graph extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_graph';
    $this->_blockGroup = 'graph';
    $this->_headerText = Mage::helper('graph')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('graph')->__('Add Item');
    parent::__construct();
  }
}