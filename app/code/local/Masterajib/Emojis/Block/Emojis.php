<?php
class Masterajib_Emojis_Block_Emojis extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getEmojis()     
     { 
        if (!$this->hasData('emojis')) {
            $this->setData('emojis', Mage::registry('emojis'));
        }
        return $this->getData('emojis');
        
    }
}