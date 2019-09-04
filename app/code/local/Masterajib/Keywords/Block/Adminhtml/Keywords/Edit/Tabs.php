<?php

class Masterajib_Keywords_Block_Adminhtml_Keywords_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('keywords_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('keywords')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('keywords')->__('Item Information'),
          'title'     => Mage::helper('keywords')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('keywords/adminhtml_keywords_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}