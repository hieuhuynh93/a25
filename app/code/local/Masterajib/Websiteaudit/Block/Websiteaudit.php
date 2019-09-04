<?php
class Masterajib_Websiteaudit_Block_Websiteaudit extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getWebsiteaudit()     
     { 
        if (!$this->hasData('websiteaudit')) {
            $this->setData('websiteaudit', Mage::registry('websiteaudit'));
        }
        return $this->getData('websiteaudit');
        
    }
}