<?php

class Masterajib_Feedback_Block_Adminhtml_Feedback_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('feedback_form', array('legend'=>Mage::helper('feedback')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('feedback')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('feedback')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('feedback')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('feedback')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('feedback')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('feedback')->__('Content'),
          'title'     => Mage::helper('feedback')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getFeedbackData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getFeedbackData());
          Mage::getSingleton('adminhtml/session')->setFeedbackData(null);
      } elseif ( Mage::registry('feedback_data') ) {
          $form->setValues(Mage::registry('feedback_data')->getData());
      }
      return parent::_prepareForm();
  }
}