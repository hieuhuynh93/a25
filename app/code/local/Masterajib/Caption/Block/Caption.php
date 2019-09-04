<?php
class Masterajib_Caption_Block_Caption extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCaption()     
     { 
        if (!$this->hasData('caption')) {
            $this->setData('caption', Mage::registry('caption'));
        }
        return $this->getData('caption');
        
    }
}