<?php

class Masterajib_Searchextensions_Block_Adminhtml_Searchextensions_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('searchextensions_form', array('legend'=>Mage::helper('searchextensions')->__('Item information')));
     
      $fieldset->addField('country_name', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Country Name'),
          'name'      => 'country_name',
      ));
      
      $fieldset->addField('country_code', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Country Code'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'country_code',
      ));
      
      $fieldset->addField('google_extension', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Google Extension'),
          'name'      => 'google_extension',
      ));
      
      $fieldset->addField('yahoo_extension', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Yahoo Extension'),
          'name'      => 'yahoo_extension',
      ));
      
      $fieldset->addField('bing_extension', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Bing Extension'),
          'name'      => 'bing_extension',
      ));
      
      $fieldset->addField('yandex_extension', 'text', array(
          'label'     => Mage::helper('searchextensions')->__('Yandex Extension'),
          'name'      => 'yandex_extension',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('searchextensions')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('searchextensions')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('searchextensions')->__('Disabled'),
              ),
          ),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getSearchextensionsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSearchextensionsData());
          Mage::getSingleton('adminhtml/session')->setSearchextensionsData(null);
      } elseif ( Mage::registry('searchextensions_data') ) {
          $form->setValues(Mage::registry('searchextensions_data')->getData());
      }
      return parent::_prepareForm();
  }
}