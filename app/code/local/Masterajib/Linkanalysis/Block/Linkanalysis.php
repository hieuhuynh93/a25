<?php
class Masterajib_Linkanalysis_Block_Linkanalysis extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getLinkanalysis()     
     { 
        if (!$this->hasData('linkanalysis')) {
            $this->setData('linkanalysis', Mage::registry('linkanalysis'));
        }
        return $this->getData('linkanalysis');
        
    }
}