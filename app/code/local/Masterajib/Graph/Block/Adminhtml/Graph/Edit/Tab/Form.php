<?php

class Masterajib_Graph_Block_Adminhtml_Graph_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('graph_form', array('legend'=>Mage::helper('graph')->__('Item information')));
     
      $fieldset->addField('linkanalysis_id', 'text', array(
          'label'     => Mage::helper('graph')->__('Link Analysis Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'linkanalysis_id',
      ));
      
      $fieldset->addField('linkdetails_id', 'text', array(
          'label'     => Mage::helper('graph')->__('Link Analysis Details Id'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'linkdetails_id',
      ));
      
      $fieldset->addField('element_name', 'text', array(
          'label'     => Mage::helper('graph')->__('Element Name'),
          'name'      => 'element_name',
      ));
      
      $fieldset->addField('element_type', 'select', array(
          'label'     => Mage::helper('graph')->__('Element Type'),
          'name'      => 'element_type',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('graph')->__('Keyword'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('graph')->__('URL'),
              ),
          ),
      ));
      
      $fieldset->addField('google_rank', 'text', array(
          'label'     => Mage::helper('graph')->__('Google Rank'),
          'name'      => 'google_rank',
      ));
      
      $fieldset->addField('yahoo_rank', 'text', array(
          'label'     => Mage::helper('graph')->__('Yahoo Rank'),
          'name'      => 'yahoo_rank',
      ));
      
      $fieldset->addField('bing_rank', 'text', array(
          'label'     => Mage::helper('graph')->__('Bing Rank'),
          'name'      => 'bing_rank',
      ));
      
      $fieldset->addField('yandex_rank', 'text', array(
          'label'     => Mage::helper('graph')->__('Yandex Rank'),
          'name'      => 'yandex_rank',
      ));
      
      $fieldset->addField('day', 'text', array(
          'label'     => Mage::helper('graph')->__('Day'),
          'name'      => 'day',
      ));
      
      $fieldset->addField('month', 'text', array(
          'label'     => Mage::helper('graph')->__('Month'),
          'name'      => 'month',
      ));
      
      $fieldset->addField('year', 'text', array(
          'label'     => Mage::helper('graph')->__('Year'),
          'name'      => 'year',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('graph')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('graph')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('graph')->__('Disabled'),
              ),
          ),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getGraphData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getGraphData());
          Mage::getSingleton('adminhtml/session')->setGraphData(null);
      } elseif ( Mage::registry('graph_data') ) {
          $form->setValues(Mage::registry('graph_data')->getData());
      }
      return parent::_prepareForm();
  }
}