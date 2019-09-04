<?php

class Masterajib_Admanagement_Model_Mysql4_Admanagement extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the admanagement_id refers to the key field in your database table.
        $this->_init('admanagement/admanagement', 'admanagement_id');
    }
}