<?php
class Masterajib_Filemanager_Block_Filemanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getFilemanager()     
     { 
        if (!$this->hasData('filemanager')) {
            $this->setData('filemanager', Mage::registry('filemanager'));
        }
        return $this->getData('filemanager');
        
    }
}