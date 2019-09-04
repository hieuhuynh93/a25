<?php

class Masterajib_Emailmarketing_Block_Adminhtml_Emailmarketing_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'emailmarketing';
        $this->_controller = 'adminhtml_emailmarketing';
        
        $this->_updateButton('save', 'label', Mage::helper('emailmarketing')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('emailmarketing')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('emailmarketing_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'emailmarketing_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'emailmarketing_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('emailmarketing_data') && Mage::registry('emailmarketing_data')->getId() ) {
            return Mage::helper('emailmarketing')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('emailmarketing_data')->getTitle()));
        } else {
            return Mage::helper('emailmarketing')->__('Add Item');
        }
    }
}