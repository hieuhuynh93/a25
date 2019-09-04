<?php

class Masterajib_Codebazzar_Block_Adminhtml_Codebazzar_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'codebazzar';
        $this->_controller = 'adminhtml_codebazzar';
        
        $this->_updateButton('save', 'label', Mage::helper('codebazzar')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('codebazzar')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('codebazzar_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'codebazzar_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'codebazzar_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('codebazzar_data') && Mage::registry('codebazzar_data')->getId() ) {
            return Mage::helper('codebazzar')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('codebazzar_data')->getTitle()));
        } else {
            return Mage::helper('codebazzar')->__('Add Item');
        }
    }
}