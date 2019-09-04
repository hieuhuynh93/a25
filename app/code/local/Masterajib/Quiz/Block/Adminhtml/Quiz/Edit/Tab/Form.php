<?php

class Masterajib_Quiz_Block_Adminhtml_Quiz_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('quiz_form', array('legend'=>Mage::helper('quiz')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('quiz')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('quiz')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('quiz')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('quiz')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('quiz')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('quiz')->__('Content'),
          'title'     => Mage::helper('quiz')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getQuizData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getQuizData());
          Mage::getSingleton('adminhtml/session')->setQuizData(null);
      } elseif ( Mage::registry('quiz_data') ) {
          $form->setValues(Mage::registry('quiz_data')->getData());
      }
      return parent::_prepareForm();
  }
}