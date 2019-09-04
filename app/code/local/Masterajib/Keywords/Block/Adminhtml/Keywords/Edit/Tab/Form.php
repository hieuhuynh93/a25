<?php

class Masterajib_Keywords_Block_Adminhtml_Keywords_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('keywords_form', array('legend'=>Mage::helper('keywords')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('keywords')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('keywords')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('keywords')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('keywords')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('keywords')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('keywords')->__('Content'),
          'title'     => Mage::helper('keywords')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getKeywordsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getKeywordsData());
          Mage::getSingleton('adminhtml/session')->setKeywordsData(null);
      } elseif ( Mage::registry('keywords_data') ) {
          $form->setValues(Mage::registry('keywords_data')->getData());
      }
      return parent::_prepareForm();
  }
}