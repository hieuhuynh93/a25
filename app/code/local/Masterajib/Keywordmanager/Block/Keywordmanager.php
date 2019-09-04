<?php
class Masterajib_Keywordmanager_Block_Keywordmanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getKeywordmanager()     
     { 
        if (!$this->hasData('keywordmanager')) {
            $this->setData('keywordmanager', Mage::registry('keywordmanager'));
        }
        return $this->getData('keywordmanager');
        
    }
}