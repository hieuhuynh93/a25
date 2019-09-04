<?php

class Masterajib_Emailmarketing_Block_Adminhtml_Emailmarketing_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('emailmarketing_form', array('legend'=>Mage::helper('emailmarketing')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('emailmarketing')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('emailmarketing')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('emailmarketing')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('emailmarketing')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('emailmarketing')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('emailmarketing')->__('Content'),
          'title'     => Mage::helper('emailmarketing')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getEmailmarketingData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getEmailmarketingData());
          Mage::getSingleton('adminhtml/session')->setEmailmarketingData(null);
      } elseif ( Mage::registry('emailmarketing_data') ) {
          $form->setValues(Mage::registry('emailmarketing_data')->getData());
      }
      return parent::_prepareForm();
  }
}