<?php

class Masterajib_Influencerusers_Block_Adminhtml_Influencerusers_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'influencerusers';
        $this->_controller = 'adminhtml_influencerusers';
        
        $this->_updateButton('save', 'label', Mage::helper('influencerusers')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('influencerusers')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('influencerusers_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'influencerusers_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'influencerusers_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('influencerusers_data') && Mage::registry('influencerusers_data')->getId() ) {
            return Mage::helper('influencerusers')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('influencerusers_data')->getTitle()));
        } else {
            return Mage::helper('influencerusers')->__('Add Item');
        }
    }
}