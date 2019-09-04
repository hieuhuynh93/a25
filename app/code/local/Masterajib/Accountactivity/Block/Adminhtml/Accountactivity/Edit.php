<?php

class Masterajib_Accountactivity_Block_Adminhtml_Accountactivity_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'accountactivity';
        $this->_controller = 'adminhtml_accountactivity';
        
        $this->_updateButton('save', 'label', Mage::helper('accountactivity')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('accountactivity')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('accountactivity_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'accountactivity_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'accountactivity_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('accountactivity_data') && Mage::registry('accountactivity_data')->getId() ) {
            return Mage::helper('accountactivity')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('accountactivity_data')->getTitle()));
        } else {
            return Mage::helper('accountactivity')->__('Add Item');
        }
    }
}