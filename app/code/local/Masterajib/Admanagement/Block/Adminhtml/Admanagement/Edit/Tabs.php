<?php

class Masterajib_Admanagement_Block_Adminhtml_Admanagement_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('admanagement_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('admanagement')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('admanagement')->__('Item Information'),
          'title'     => Mage::helper('admanagement')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('admanagement/adminhtml_admanagement_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}