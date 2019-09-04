<?php

class Masterajib_Accountactivity_Model_Mysql4_Accountactivity extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the accountactivity_id refers to the key field in your database table.
        $this->_init('accountactivity/accountactivity', 'accountactivity_id');
    }
}