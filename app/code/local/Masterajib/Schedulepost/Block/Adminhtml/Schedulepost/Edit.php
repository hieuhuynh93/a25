<?php

class Masterajib_Schedulepost_Block_Adminhtml_Schedulepost_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'schedulepost';
        $this->_controller = 'adminhtml_schedulepost';
        
        $this->_updateButton('save', 'label', Mage::helper('schedulepost')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('schedulepost')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('schedulepost_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'schedulepost_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'schedulepost_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('schedulepost_data') && Mage::registry('schedulepost_data')->getId() ) {
            return Mage::helper('schedulepost')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('schedulepost_data')->getTitle()));
        } else {
            return Mage::helper('schedulepost')->__('Add Item');
        }
    }
}