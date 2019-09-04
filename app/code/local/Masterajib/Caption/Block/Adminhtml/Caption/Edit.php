<?php

class Masterajib_Caption_Block_Adminhtml_Caption_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'caption';
        $this->_controller = 'adminhtml_caption';
        
        $this->_updateButton('save', 'label', Mage::helper('caption')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('caption')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('caption_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'caption_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'caption_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('caption_data') && Mage::registry('caption_data')->getId() ) {
            return Mage::helper('caption')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('caption_data')->getTitle()));
        } else {
            return Mage::helper('caption')->__('Add Item');
        }
    }
}