<?php

class Masterajib_Bulkposting_Block_Adminhtml_Bulkposting_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'bulkposting';
        $this->_controller = 'adminhtml_bulkposting';
        
        $this->_updateButton('save', 'label', Mage::helper('bulkposting')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('bulkposting')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('bulkposting_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'bulkposting_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'bulkposting_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('bulkposting_data') && Mage::registry('bulkposting_data')->getId() ) {
            return Mage::helper('bulkposting')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('bulkposting_data')->getTitle()));
        } else {
            return Mage::helper('bulkposting')->__('Add Item');
        }
    }
}