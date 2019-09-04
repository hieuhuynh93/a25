<?php
class Masterajib_Emailmarketing_Block_Emailmarketing extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getEmailmarketing()     
     { 
        if (!$this->hasData('emailmarketing')) {
            $this->setData('emailmarketing', Mage::registry('emailmarketing'));
        }
        return $this->getData('emailmarketing');
        
    }
}