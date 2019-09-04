<?php

class Masterajib_Influencer_Block_Adminhtml_Influencer_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('influencer_form', array('legend'=>Mage::helper('influencer')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('influencer')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('influencer')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('influencer')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('influencer')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('influencer')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('influencer')->__('Content'),
          'title'     => Mage::helper('influencer')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getInfluencerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getInfluencerData());
          Mage::getSingleton('adminhtml/session')->setInfluencerData(null);
      } elseif ( Mage::registry('influencer_data') ) {
          $form->setValues(Mage::registry('influencer_data')->getData());
      }
      return parent::_prepareForm();
  }
}