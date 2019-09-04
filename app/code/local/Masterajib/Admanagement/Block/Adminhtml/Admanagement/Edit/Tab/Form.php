<?php

class Masterajib_Admanagement_Block_Adminhtml_Admanagement_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('admanagement_form', array('legend'=>Mage::helper('admanagement')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('admanagement')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('admanagement')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('admanagement')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('admanagement')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('admanagement')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('admanagement')->__('Content'),
          'title'     => Mage::helper('admanagement')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getAdmanagementData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAdmanagementData());
          Mage::getSingleton('adminhtml/session')->setAdmanagementData(null);
      } elseif ( Mage::registry('admanagement_data') ) {
          $form->setValues(Mage::registry('admanagement_data')->getData());
      }
      return parent::_prepareForm();
  }
}