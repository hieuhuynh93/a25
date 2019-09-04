<?php

class Masterajib_Influencerusers_Block_Adminhtml_Influencerusers_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('influencerusers_form', array('legend'=>Mage::helper('influencerusers')->__('Item information')));
     
      /*$fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));*/
      
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Customer Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));
      
      $fieldset->addField('platform', 'select', array(
          'label'     => Mage::helper('influencerusers')->__('Platform'),
          'name'      => 'platform',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('influencerusers')->__('Facebook'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('influencerusers')->__('Instagram'),
              ),
              
              array(
                  'value'     => 3,
                  'label'     => Mage::helper('influencerusers')->__('Twitter'),
              ),
          ),
      ));
      
      $fieldset->addField('username', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('User Name'),
          'name'      => 'username',
      ));
      
      $fieldset->addField('email', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Email'),
          'name'      => 'email',
      ));
      
      $fieldset->addField('password', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Password'),
          'name'      => 'password',
      ));
      
      $fieldset->addField('name', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Name'),
          'name'      => 'name',
      ));
      
      

      $fieldset->addField('authorized_key', 'text', array(
          'label'     => Mage::helper('influencerusers')->__('Authorized Key'),
          'required'  => false,
          'style'     => 'width:700px; height:100px;',
          'name'      => 'authorized_key',
	  ));
      
      $fieldset->addField('user_type', 'select', array(
          'label'     => Mage::helper('influencerusers')->__('User Type'),
          'name'      => 'user_type',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('influencerusers')->__('Normal User'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('influencerusers')->__('Influencer'),
              ),
          ),
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('influencerusers')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('influencerusers')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('influencerusers')->__('Disabled'),
              ),
          ),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getInfluencerusersData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getInfluencerusersData());
          Mage::getSingleton('adminhtml/session')->setInfluencerusersData(null);
      } elseif ( Mage::registry('influencerusers_data') ) {
          $form->setValues(Mage::registry('influencerusers_data')->getData());
      }
      return parent::_prepareForm();
  }
}