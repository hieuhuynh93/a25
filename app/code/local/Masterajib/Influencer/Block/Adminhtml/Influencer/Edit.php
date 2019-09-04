<?php

class Masterajib_Influencer_Block_Adminhtml_Influencer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'influencer';
        $this->_controller = 'adminhtml_influencer';
        
        $this->_updateButton('save', 'label', Mage::helper('influencer')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('influencer')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('influencer_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'influencer_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'influencer_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('influencer_data') && Mage::registry('influencer_data')->getId() ) {
            return Mage::helper('influencer')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('influencer_data')->getTitle()));
        } else {
            return Mage::helper('influencer')->__('Add Item');
        }
    }
}