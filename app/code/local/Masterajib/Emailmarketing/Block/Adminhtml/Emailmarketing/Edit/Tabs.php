<?php

class Masterajib_Emailmarketing_Block_Adminhtml_Emailmarketing_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('emailmarketing_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('emailmarketing')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('emailmarketing')->__('Item Information'),
          'title'     => Mage::helper('emailmarketing')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('emailmarketing/adminhtml_emailmarketing_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}