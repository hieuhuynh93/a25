<?php
class Masterajib_Influencerusers_Block_Influencerusers extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getInfluencerusers()     
     { 
        if (!$this->hasData('influencerusers')) {
            $this->setData('influencerusers', Mage::registry('influencerusers'));
        }
        return $this->getData('influencerusers');
        
    }
}