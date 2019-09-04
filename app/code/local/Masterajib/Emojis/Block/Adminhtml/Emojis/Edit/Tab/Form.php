<?php

class Masterajib_Emojis_Block_Adminhtml_Emojis_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('emojis_form', array('legend'=>Mage::helper('emojis')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('emojis')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      
      $fieldset->addField('char', 'text', array(
          'label'     => Mage::helper('emojis')->__('Char'),
          'name'      => 'char',
      ));
      
      $fieldset->addField('dec', 'text', array(
          'label'     => Mage::helper('emojis')->__('Dec'),
          'name'      => 'dec',
      ));
      
      $fieldset->addField('hex', 'text', array(
          'label'     => Mage::helper('emojis')->__('Hex'),
          'name'      => 'hex',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('emojis')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('emojis')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('emojis')->__('Disabled'),
              ),
          ),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getEmojisData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getEmojisData());
          Mage::getSingleton('adminhtml/session')->setEmojisData(null);
      } elseif ( Mage::registry('emojis_data') ) {
          $form->setValues(Mage::registry('emojis_data')->getData());
      }
      return parent::_prepareForm();
  }
}