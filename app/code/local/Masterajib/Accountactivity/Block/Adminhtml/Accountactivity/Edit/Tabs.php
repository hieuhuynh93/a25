<?php

class Masterajib_Accountactivity_Block_Adminhtml_Accountactivity_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('accountactivity_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('accountactivity')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('accountactivity')->__('Item Information'),
          'title'     => Mage::helper('accountactivity')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('accountactivity/adminhtml_accountactivity_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}