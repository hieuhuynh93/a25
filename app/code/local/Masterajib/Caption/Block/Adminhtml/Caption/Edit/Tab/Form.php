<?php

class Masterajib_Caption_Block_Adminhtml_Caption_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('caption_form', array('legend'=>Mage::helper('caption')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('caption')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('caption')->__('Customer Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('caption')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('caption')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('caption')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('caption_text', 'editor', array(
          'name'      => 'caption_text',
          'label'     => Mage::helper('caption')->__('Caption Text'),
          'title'     => Mage::helper('caption')->__('Caption Text'),
          'style'     => 'width:700px; height:100px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getCaptionData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getCaptionData());
          Mage::getSingleton('adminhtml/session')->setCaptionData(null);
      } elseif ( Mage::registry('caption_data') ) {
          $form->setValues(Mage::registry('caption_data')->getData());
      }
      return parent::_prepareForm();
  }
}