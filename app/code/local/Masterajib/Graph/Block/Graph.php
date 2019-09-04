<?php
class Masterajib_Graph_Block_Graph extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getGraph()     
     { 
        if (!$this->hasData('graph')) {
            $this->setData('graph', Mage::registry('graph'));
        }
        return $this->getData('graph');
        
    }
}