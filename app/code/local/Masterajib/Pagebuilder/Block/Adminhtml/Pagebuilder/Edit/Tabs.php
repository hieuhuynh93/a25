<?php

class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('pagebuilder_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('pagebuilder')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('pagebuilder')->__('Item Information'),
          'title'     => Mage::helper('pagebuilder')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('pagebuilder/adminhtml_pagebuilder_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}