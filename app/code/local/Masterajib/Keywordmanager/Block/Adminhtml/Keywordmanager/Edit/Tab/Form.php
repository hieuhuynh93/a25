<?php

class Masterajib_Keywordmanager_Block_Adminhtml_Keywordmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('keywordmanager_form', array('legend'=>Mage::helper('keywordmanager')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('keywordmanager')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('keywordmanager')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('keywordmanager')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('keywordmanager')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('keywordmanager')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('keywordmanager')->__('Content'),
          'title'     => Mage::helper('keywordmanager')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getKeywordmanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getKeywordmanagerData());
          Mage::getSingleton('adminhtml/session')->setKeywordmanagerData(null);
      } elseif ( Mage::registry('keywordmanager_data') ) {
          $form->setValues(Mage::registry('keywordmanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}