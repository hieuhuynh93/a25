<?php

class Masterajib_Linkanalysis_Block_Adminhtml_Linkanalysis_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('linkanalysis_form', array('legend'=>Mage::helper('linkanalysis')->__('Item information')));
     
      $fieldset->addField('url', 'editor', array(
          'name'      => 'url',
          'label'     => Mage::helper('linkanalysis')->__('URL'),
          'title'     => Mage::helper('linkanalysis')->__('URL'),
          'style'     => 'width:700px; height:50px;',
          'required'  => true,
      ));
      
      $fieldset->addField('url_type', 'select', array(
          'label'     => Mage::helper('linkanalysis')->__('URL Type'),
          'name'      => 'url_type',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('linkanalysis')->__('Primary Domain'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('linkanalysis')->__('Internal Link'),
              ),
              
              array(
                  'value'     => 3,
                  'label'     => Mage::helper('linkanalysis')->__('External Link'),
              ),
          ),
      ));
      
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('linkanalysis')->__('Customer Id'),
          'name'      => 'customer_id',
      ));
      
      $fieldset->addField('no_of_url', 'text', array(
          'label'     => Mage::helper('linkanalysis')->__('No Of URL'),
          'name'      => 'no_of_url',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('linkanalysis')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('linkanalysis')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('linkanalysis')->__('Processsing'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('linkanalysis')->__('Completed'),
              ),
              
              array(
                  'value'     => 3,
                  'label'     => Mage::helper('linkanalysis')->__('Not Started'),
              ),
          ),
      ));
     
      
     
      if ( Mage::getSingleton('adminhtml/session')->getLinkanalysisData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getLinkanalysisData());
          Mage::getSingleton('adminhtml/session')->setLinkanalysisData(null);
      } elseif ( Mage::registry('linkanalysis_data') ) {
          $form->setValues(Mage::registry('linkanalysis_data')->getData());
      }
      return parent::_prepareForm();
  }
}