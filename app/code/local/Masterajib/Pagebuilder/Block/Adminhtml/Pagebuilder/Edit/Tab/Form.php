<?php

class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('pagebuilder_form', array('legend'=>Mage::helper('pagebuilder')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('pagebuilder')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('pagebuilder')->__('Customer Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('pagebuilder')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
      
      $fieldset->addField('preview_image', 'file', array(
          'label'     => Mage::helper('pagebuilder')->__('Preview Image'),
          'required'  => false,
          'name'      => 'preview_image',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('pagebuilder')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('pagebuilder')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('pagebuilder')->__('Disabled'),
              ),
          ),
      ));
      
      //--------------------------------------------------
      $fieldset->addField('template_type', 'select', array(
          'label'     => Mage::helper('pagebuilder')->__('Template Type'),
          'name'      => 'template_type',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('pagebuilder')->__('All'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('pagebuilder')->__('Lead Generation'),
              ),
              array(
                  'value'     => 3,
                  'label'     => Mage::helper('pagebuilder')->__('Two-Step'),
              ),
              array(
                  'value'     => 4,
                  'label'     => Mage::helper('pagebuilder')->__('Click-Through'),
              ),
              array(
                  'value'     => 5,
                  'label'     => Mage::helper('pagebuilder')->__('Thank You'),
              ),
              array(
                  'value'     => 6,
                  'label'     => Mage::helper('pagebuilder')->__('E-book'),
              ),
              array(
                  'value'     => 7,
                  'label'     => Mage::helper('pagebuilder')->__('Event'),
              ),
              array(
                  'value'     => 8,
                  'label'     => Mage::helper('pagebuilder')->__('App'),
              ),
          ),
      ));
      //-------------------------------------------------
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('pagebuilder')->__('Content'),
          'title'     => Mage::helper('pagebuilder')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getPagebuilderData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPagebuilderData());
          Mage::getSingleton('adminhtml/session')->setPagebuilderData(null);
      } elseif ( Mage::registry('pagebuilder_data') ) {
          $form->setValues(Mage::registry('pagebuilder_data')->getData());
      }
      return parent::_prepareForm();
  }
}