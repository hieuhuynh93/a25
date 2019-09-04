<?php

class Masterajib_Emojis_Block_Adminhtml_Emojis_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('emojis_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('emojis')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('emojis')->__('Item Information'),
          'title'     => Mage::helper('emojis')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('emojis/adminhtml_emojis_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}