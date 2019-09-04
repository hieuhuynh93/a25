<?php
class Masterajib_Keywords_Block_Keywords extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getKeywords()     
     { 
        if (!$this->hasData('keywords')) {
            $this->setData('keywords', Mage::registry('keywords'));
        }
        return $this->getData('keywords');
        
    }
}