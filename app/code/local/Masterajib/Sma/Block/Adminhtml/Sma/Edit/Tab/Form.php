<?php

class Masterajib_Sma_Block_Adminhtml_Sma_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('sma_form', array('legend'=>Mage::helper('sma')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('sma')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('sma')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('sma')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('sma')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('sma')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('sma')->__('Content'),
          'title'     => Mage::helper('sma')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getSmaData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSmaData());
          Mage::getSingleton('adminhtml/session')->setSmaData(null);
      } elseif ( Mage::registry('sma_data') ) {
          $form->setValues(Mage::registry('sma_data')->getData());
      }
      return parent::_prepareForm();
  }
}