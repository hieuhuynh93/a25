<?php

class Masterajib_Servicemanagement_Block_Adminhtml_Servicemanagement_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'servicemanagement';
        $this->_controller = 'adminhtml_servicemanagement';
        
        $this->_updateButton('save', 'label', Mage::helper('servicemanagement')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('servicemanagement')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('servicemanagement_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'servicemanagement_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'servicemanagement_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('servicemanagement_data') && Mage::registry('servicemanagement_data')->getId() ) {
            return Mage::helper('servicemanagement')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('servicemanagement_data')->getTitle()));
        } else {
            return Mage::helper('servicemanagement')->__('Add Item');
        }
    }
}