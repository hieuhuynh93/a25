<?php

class Masterajib_Smallseotools_Block_Adminhtml_Smallseotools_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('smallseotools_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('smallseotools')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('smallseotools')->__('Item Information'),
          'title'     => Mage::helper('smallseotools')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('smallseotools/adminhtml_smallseotools_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}