<?php

class Masterajib_Searchextensions_Block_Adminhtml_Searchextensions_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('searchextensions_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('searchextensions')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('searchextensions')->__('Item Information'),
          'title'     => Mage::helper('searchextensions')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('searchextensions/adminhtml_searchextensions_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}