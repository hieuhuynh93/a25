<?php

class Masterajib_Filemanager_Block_Adminhtml_Filemanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'filemanager';
        $this->_controller = 'adminhtml_filemanager';
        
        $this->_updateButton('save', 'label', Mage::helper('filemanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('filemanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('filemanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'filemanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'filemanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('filemanager_data') && Mage::registry('filemanager_data')->getId() ) {
            return Mage::helper('filemanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('filemanager_data')->getTitle()));
        } else {
            return Mage::helper('filemanager')->__('Add Item');
        }
    }
}