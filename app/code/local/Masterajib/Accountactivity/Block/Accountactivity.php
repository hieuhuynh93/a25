<?php
class Masterajib_Accountactivity_Block_Accountactivity extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAccountactivity()     
     { 
        if (!$this->hasData('accountactivity')) {
            $this->setData('accountactivity', Mage::registry('accountactivity'));
        }
        return $this->getData('accountactivity');
        
    }
}