<?php

class Masterajib_Schedulepost_Block_Adminhtml_Schedulepost_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('schedulepost_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('schedulepost')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('schedulepost')->__('Item Information'),
          'title'     => Mage::helper('schedulepost')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('schedulepost/adminhtml_schedulepost_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}