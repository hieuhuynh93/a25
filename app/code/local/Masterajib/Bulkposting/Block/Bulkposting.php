<?php
class Masterajib_Bulkposting_Block_Bulkposting extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getBulkposting()     
     { 
        if (!$this->hasData('bulkposting')) {
            $this->setData('bulkposting', Mage::registry('bulkposting'));
        }
        return $this->getData('bulkposting');
        
    }
}