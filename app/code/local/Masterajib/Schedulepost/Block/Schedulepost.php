<?php
class Masterajib_Schedulepost_Block_Schedulepost extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSchedulepost()     
     { 
        if (!$this->hasData('schedulepost')) {
            $this->setData('schedulepost', Mage::registry('schedulepost'));
        }
        return $this->getData('schedulepost');
        
    }
}