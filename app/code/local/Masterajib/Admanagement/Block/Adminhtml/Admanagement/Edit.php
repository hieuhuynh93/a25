<?php

class Masterajib_Admanagement_Block_Adminhtml_Admanagement_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'admanagement';
        $this->_controller = 'adminhtml_admanagement';
        
        $this->_updateButton('save', 'label', Mage::helper('admanagement')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('admanagement')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('admanagement_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'admanagement_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'admanagement_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('admanagement_data') && Mage::registry('admanagement_data')->getId() ) {
            return Mage::helper('admanagement')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('admanagement_data')->getTitle()));
        } else {
            return Mage::helper('admanagement')->__('Add Item');
        }
    }
}