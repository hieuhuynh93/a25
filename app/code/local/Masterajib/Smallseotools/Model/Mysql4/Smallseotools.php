<?php

class Masterajib_Smallseotools_Model_Mysql4_Smallseotools extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the smallseotools_id refers to the key field in your database table.
        $this->_init('smallseotools/smallseotools', 'smallseotools_id');
    }
}