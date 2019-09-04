<?php

class Masterajib_Codebazzar_Block_Adminhtml_Codebazzar_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('codebazzar_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('codebazzar')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('codebazzar')->__('Item Information'),
          'title'     => Mage::helper('codebazzar')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('codebazzar/adminhtml_codebazzar_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}