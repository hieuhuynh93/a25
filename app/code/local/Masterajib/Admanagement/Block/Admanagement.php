<?php
class Masterajib_Admanagement_Block_Admanagement extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAdmanagement()     
     { 
        if (!$this->hasData('admanagement')) {
            $this->setData('admanagement', Mage::registry('admanagement'));
        }
        return $this->getData('admanagement');
        
    }
}