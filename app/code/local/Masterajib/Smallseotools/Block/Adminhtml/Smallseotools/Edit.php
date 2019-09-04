<?php

class Masterajib_Smallseotools_Block_Adminhtml_Smallseotools_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'smallseotools';
        $this->_controller = 'adminhtml_smallseotools';
        
        $this->_updateButton('save', 'label', Mage::helper('smallseotools')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('smallseotools')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('smallseotools_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'smallseotools_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'smallseotools_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('smallseotools_data') && Mage::registry('smallseotools_data')->getId() ) {
            return Mage::helper('smallseotools')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('smallseotools_data')->getTitle()));
        } else {
            return Mage::helper('smallseotools')->__('Add Item');
        }
    }
}