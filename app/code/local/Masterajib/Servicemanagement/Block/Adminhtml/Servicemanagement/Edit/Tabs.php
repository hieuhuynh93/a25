<?php

class Masterajib_Servicemanagement_Block_Adminhtml_Servicemanagement_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('servicemanagement_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('servicemanagement')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('servicemanagement')->__('Item Information'),
          'title'     => Mage::helper('servicemanagement')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('servicemanagement/adminhtml_servicemanagement_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}