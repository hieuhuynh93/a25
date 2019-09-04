<?php

class Masterajib_Linkanalysis_Block_Adminhtml_Linkanalysis_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('linkanalysis_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('linkanalysis')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('linkanalysis')->__('Item Information'),
          'title'     => Mage::helper('linkanalysis')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('linkanalysis/adminhtml_linkanalysis_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}