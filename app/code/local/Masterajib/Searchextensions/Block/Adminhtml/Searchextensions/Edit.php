<?php

class Masterajib_Searchextensions_Block_Adminhtml_Searchextensions_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'searchextensions';
        $this->_controller = 'adminhtml_searchextensions';
        
        $this->_updateButton('save', 'label', Mage::helper('searchextensions')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('searchextensions')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('searchextensions_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'searchextensions_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'searchextensions_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('searchextensions_data') && Mage::registry('searchextensions_data')->getId() ) {
            return Mage::helper('searchextensions')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('searchextensions_data')->getTitle()));
        } else {
            return Mage::helper('searchextensions')->__('Add Item');
        }
    }
}