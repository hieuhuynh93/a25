<?php

class Masterajib_Schedulepost_Block_Adminhtml_Schedulepost_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('schedulepost_form', array('legend'=>Mage::helper('schedulepost')->__('Item information')));
     
      $fieldset->addField('bulkposting_id', 'text', array(
          'label'     => Mage::helper('schedulepost')->__('Bulkposting Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'bulkposting_id',
      ));

      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('schedulepost')->__('Customer Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));
      
      $fieldset->addField('influencerusers_id', 'text', array(
          'label'     => Mage::helper('schedulepost')->__('Influencer User Ids'),
          'name'      => 'influencerusers_id',
      ));
      
      $fieldset->addField('media_path', 'editor', array(
          'name'      => 'media_path',
          'label'     => Mage::helper('schedulepost')->__('Media Path'),
          'title'     => Mage::helper('schedulepost')->__('Media Path'),
          'style'     => 'width:700px; height:100px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('schedulepost')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('schedulepost')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('schedulepost')->__('Disabled'),
              ),
          ),
      ));
     
      
     
      if ( Mage::getSingleton('adminhtml/session')->getSchedulepostData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSchedulepostData());
          Mage::getSingleton('adminhtml/session')->setSchedulepostData(null);
      } elseif ( Mage::registry('schedulepost_data') ) {
          $form->setValues(Mage::registry('schedulepost_data')->getData());
      }
      return parent::_prepareForm();
  }
}