<?php

class Masterajib_Keywordmanager_Block_Adminhtml_Keywordmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'keywordmanager';
        $this->_controller = 'adminhtml_keywordmanager';
        
        $this->_updateButton('save', 'label', Mage::helper('keywordmanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('keywordmanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('keywordmanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'keywordmanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'keywordmanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('keywordmanager_data') && Mage::registry('keywordmanager_data')->getId() ) {
            return Mage::helper('keywordmanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('keywordmanager_data')->getTitle()));
        } else {
            return Mage::helper('keywordmanager')->__('Add Item');
        }
    }
}