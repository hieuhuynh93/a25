<?php
class Masterajib_Influencer_Block_Influencer extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getInfluencer()     
     { 
        if (!$this->hasData('influencer')) {
            $this->setData('influencer', Mage::registry('influencer'));
        }
        return $this->getData('influencer');
        
    }
}