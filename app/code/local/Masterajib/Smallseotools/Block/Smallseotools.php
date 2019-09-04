<?php
class Masterajib_Smallseotools_Block_Smallseotools extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSmallseotools()     
     { 
        if (!$this->hasData('smallseotools')) {
            $this->setData('smallseotools', Mage::registry('smallseotools'));
        }
        return $this->getData('smallseotools');
        
    }
}