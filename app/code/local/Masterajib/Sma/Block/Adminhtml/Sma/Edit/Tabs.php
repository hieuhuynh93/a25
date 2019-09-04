<?php

class Masterajib_Sma_Block_Adminhtml_Sma_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('sma_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('sma')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('sma')->__('Item Information'),
          'title'     => Mage::helper('sma')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('sma/adminhtml_sma_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}