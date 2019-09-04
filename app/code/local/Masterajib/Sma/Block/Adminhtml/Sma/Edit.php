<?php

class Masterajib_Sma_Block_Adminhtml_Sma_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'sma';
        $this->_controller = 'adminhtml_sma';
        
        $this->_updateButton('save', 'label', Mage::helper('sma')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('sma')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('sma_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'sma_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'sma_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('sma_data') && Mage::registry('sma_data')->getId() ) {
            return Mage::helper('sma')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('sma_data')->getTitle()));
        } else {
            return Mage::helper('sma')->__('Add Item');
        }
    }
}