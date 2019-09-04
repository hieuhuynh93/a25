<?php

class Masterajib_Keywords_Model_Mysql4_Keywords extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the keywords_id refers to the key field in your database table.
        $this->_init('keywords/keywords', 'keywords_id');
    }
}