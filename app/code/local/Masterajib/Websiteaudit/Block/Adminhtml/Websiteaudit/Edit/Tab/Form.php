<?php

class Masterajib_Websiteaudit_Block_Adminhtml_Websiteaudit_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('websiteaudit_form', array('legend'=>Mage::helper('websiteaudit')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('websiteaudit')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('websiteaudit')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('websiteaudit')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('websiteaudit')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('websiteaudit')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('websiteaudit')->__('Content'),
          'title'     => Mage::helper('websiteaudit')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getWebsiteauditData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getWebsiteauditData());
          Mage::getSingleton('adminhtml/session')->setWebsiteauditData(null);
      } elseif ( Mage::registry('websiteaudit_data') ) {
          $form->setValues(Mage::registry('websiteaudit_data')->getData());
      }
      return parent::_prepareForm();
  }
}