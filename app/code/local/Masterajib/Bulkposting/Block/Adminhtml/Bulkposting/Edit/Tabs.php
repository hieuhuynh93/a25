<?php

class Masterajib_Bulkposting_Block_Adminhtml_Bulkposting_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('bulkposting_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('bulkposting')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('bulkposting')->__('Item Information'),
          'title'     => Mage::helper('bulkposting')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('bulkposting/adminhtml_bulkposting_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}