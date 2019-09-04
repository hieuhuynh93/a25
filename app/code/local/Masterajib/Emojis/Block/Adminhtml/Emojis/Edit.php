<?php

class Masterajib_Emojis_Block_Adminhtml_Emojis_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'emojis';
        $this->_controller = 'adminhtml_emojis';
        
        $this->_updateButton('save', 'label', Mage::helper('emojis')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('emojis')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('emojis_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'emojis_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'emojis_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('emojis_data') && Mage::registry('emojis_data')->getId() ) {
            return Mage::helper('emojis')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('emojis_data')->getTitle()));
        } else {
            return Mage::helper('emojis')->__('Add Item');
        }
    }
}