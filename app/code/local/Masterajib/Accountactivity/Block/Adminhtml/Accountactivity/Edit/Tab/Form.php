<?php

class Masterajib_Accountactivity_Block_Adminhtml_Accountactivity_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('accountactivity_form', array('legend'=>Mage::helper('accountactivity')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('accountactivity')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('accountactivity')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('accountactivity')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('accountactivity')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('accountactivity')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('accountactivity')->__('Content'),
          'title'     => Mage::helper('accountactivity')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getAccountactivityData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAccountactivityData());
          Mage::getSingleton('adminhtml/session')->setAccountactivityData(null);
      } elseif ( Mage::registry('accountactivity_data') ) {
          $form->setValues(Mage::registry('accountactivity_data')->getData());
      }
      return parent::_prepareForm();
  }
}