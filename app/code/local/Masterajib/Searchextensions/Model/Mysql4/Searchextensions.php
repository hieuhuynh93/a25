<?php

class Masterajib_Searchextensions_Model_Mysql4_Searchextensions extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the searchextensions_id refers to the key field in your database table.
        $this->_init('searchextensions/searchextensions', 'searchextensions_id');
    }
}