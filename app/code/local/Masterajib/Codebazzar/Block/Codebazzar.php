<?php
class Masterajib_Codebazzar_Block_Codebazzar extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCodebazzar()     
     { 
        if (!$this->hasData('codebazzar')) {
            $this->setData('codebazzar', Mage::registry('codebazzar'));
        }
        return $this->getData('codebazzar');
        
    }
}