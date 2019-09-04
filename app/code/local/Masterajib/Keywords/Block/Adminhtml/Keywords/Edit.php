<?php

class Masterajib_Keywords_Block_Adminhtml_Keywords_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'keywords';
        $this->_controller = 'adminhtml_keywords';
        
        $this->_updateButton('save', 'label', Mage::helper('keywords')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('keywords')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('keywords_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'keywords_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'keywords_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('keywords_data') && Mage::registry('keywords_data')->getId() ) {
            return Mage::helper('keywords')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('keywords_data')->getTitle()));
        } else {
            return Mage::helper('keywords')->__('Add Item');
        }
    }
}