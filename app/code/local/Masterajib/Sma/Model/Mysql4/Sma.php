<?php

class Masterajib_Sma_Model_Mysql4_Sma extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the sma_id refers to the key field in your database table.
        $this->_init('sma/sma', 'sma_id');
    }
}