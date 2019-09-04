<?php

class Masterajib_Schedulepost_Model_Mysql4_Schedulepost extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the schedulepost_id refers to the key field in your database table.
        $this->_init('schedulepost/schedulepost', 'schedulepost_id');
    }
}