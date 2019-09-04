<?php
class Masterajib_Searchextensions_Block_Searchextensions extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSearchextensions()     
     { 
        if (!$this->hasData('searchextensions')) {
            $this->setData('searchextensions', Mage::registry('searchextensions'));
        }
        return $this->getData('searchextensions');
        
    }
}