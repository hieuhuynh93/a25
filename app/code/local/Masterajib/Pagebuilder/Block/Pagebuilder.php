<?php
class Masterajib_Pagebuilder_Block_Pagebuilder extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPagebuilder()     
     { 
        if (!$this->hasData('pagebuilder')) {
            $this->setData('pagebuilder', Mage::registry('pagebuilder'));
        }
        return $this->getData('pagebuilder');
        
    }
}