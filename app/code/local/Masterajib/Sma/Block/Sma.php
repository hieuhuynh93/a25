<?php
class Masterajib_Sma_Block_Sma extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSma()     
     { 
        if (!$this->hasData('sma')) {
            $this->setData('sma', Mage::registry('sma'));
        }
        return $this->getData('sma');
        
    }
}