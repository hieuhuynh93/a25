<?php

class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'pagebuilder';
        $this->_controller = 'adminhtml_pagebuilder';
        
        $this->_updateButton('save', 'label', Mage::helper('pagebuilder')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('pagebuilder')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('pagebuilder_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'pagebuilder_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'pagebuilder_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('pagebuilder_data') && Mage::registry('pagebuilder_data')->getId() ) {
            return Mage::helper('pagebuilder')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('pagebuilder_data')->getTitle()));
        } else {
            return Mage::helper('pagebuilder')->__('Add Item');
        }
    }
}