<?php

class Masterajib_Influencerusers_Block_Adminhtml_Influencerusers_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('influencerusers_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('influencerusers')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('influencerusers')->__('Item Information'),
          'title'     => Mage::helper('influencerusers')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('influencerusers/adminhtml_influencerusers_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}