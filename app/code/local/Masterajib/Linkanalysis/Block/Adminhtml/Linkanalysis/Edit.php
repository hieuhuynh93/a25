<?php

class Masterajib_Linkanalysis_Block_Adminhtml_Linkanalysis_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'linkanalysis';
        $this->_controller = 'adminhtml_linkanalysis';
        
        $this->_updateButton('save', 'label', Mage::helper('linkanalysis')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('linkanalysis')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('linkanalysis_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'linkanalysis_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'linkanalysis_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('linkanalysis_data') && Mage::registry('linkanalysis_data')->getId() ) {
            return Mage::helper('linkanalysis')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('linkanalysis_data')->getTitle()));
        } else {
            return Mage::helper('linkanalysis')->__('Add Item');
        }
    }
}