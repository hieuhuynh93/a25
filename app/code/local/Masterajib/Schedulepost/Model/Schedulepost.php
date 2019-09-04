<?php

class Masterajib_Schedulepost_Model_Schedulepost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('schedulepost/schedulepost');
    }
}