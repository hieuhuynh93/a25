<?php

class Masterajib_Smallseotools_Block_Adminhtml_Smallseotools_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('smallseotools_form', array('legend'=>Mage::helper('smallseotools')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('smallseotools')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('smallseotools')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
      
      $fieldset->addField('action', 'text', array(
          'label'     => Mage::helper('smallseotools')->__('Form Action'),
          'name'      => 'action',
      ));
      
      $fieldset->addField('ajax_function', 'text', array(
          'label'     => Mage::helper('smallseotools')->__('Ajax Action'),
          'name'      => 'ajax_function',
      ));
      
      $fieldset->addField('positionIndex', 'text', array(
          'label'     => Mage::helper('smallseotools')->__('Position'),
          'name'      => 'positionIndex',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('smallseotools')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('smallseotools')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('smallseotools')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('smallseotools')->__('Content'),
          'title'     => Mage::helper('smallseotools')->__('Content'),
          'style'     => 'width:700px; height:100px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getSmallseotoolsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSmallseotoolsData());
          Mage::getSingleton('adminhtml/session')->setSmallseotoolsData(null);
      } elseif ( Mage::registry('smallseotools_data') ) {
          $form->setValues(Mage::registry('smallseotools_data')->getData());
      }
      return parent::_prepareForm();
  }
}