<?php
class Masterajib_Seotoolsaccountactivity_Block_Seotoolsaccountactivity extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSeotoolsaccountactivity()     
     { 
        if (!$this->hasData('seotoolsaccountactivity')) {
            $this->setData('seotoolsaccountactivity', Mage::registry('seotoolsaccountactivity'));
        }
        return $this->getData('seotoolsaccountactivity');
        
    }
}