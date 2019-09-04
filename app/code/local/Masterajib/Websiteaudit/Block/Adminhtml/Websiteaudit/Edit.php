<?php

class Masterajib_Websiteaudit_Block_Adminhtml_Websiteaudit_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'websiteaudit';
        $this->_controller = 'adminhtml_websiteaudit';
        
        $this->_updateButton('save', 'label', Mage::helper('websiteaudit')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('websiteaudit')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('websiteaudit_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'websiteaudit_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'websiteaudit_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('websiteaudit_data') && Mage::registry('websiteaudit_data')->getId() ) {
            return Mage::helper('websiteaudit')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('websiteaudit_data')->getTitle()));
        } else {
            return Mage::helper('websiteaudit')->__('Add Item');
        }
    }
}