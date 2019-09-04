<?php

class Masterajib_Graph_Block_Adminhtml_Graph_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'graph';
        $this->_controller = 'adminhtml_graph';
        
        $this->_updateButton('save', 'label', Mage::helper('graph')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('graph')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('graph_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'graph_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'graph_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('graph_data') && Mage::registry('graph_data')->getId() ) {
            return Mage::helper('graph')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('graph_data')->getTitle()));
        } else {
            return Mage::helper('graph')->__('Add Item');
        }
    }
}