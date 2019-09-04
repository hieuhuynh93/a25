<?php

class Masterajib_Influencer_Block_Adminhtml_Influencer_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('influencer_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('influencer')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('influencer')->__('Item Information'),
          'title'     => Mage::helper('influencer')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('influencer/adminhtml_influencer_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}