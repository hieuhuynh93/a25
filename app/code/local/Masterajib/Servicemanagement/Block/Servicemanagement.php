<?php
class Masterajib_Servicemanagement_Block_Servicemanagement extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getServicemanagement()     
     { 
        if (!$this->hasData('servicemanagement')) {
            $this->setData('servicemanagement', Mage::registry('servicemanagement'));
        }
        return $this->getData('servicemanagement');
        
    }
}