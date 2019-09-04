<?php

class Masterajib_Bulkposting_Model_Mysql4_Bulkposting extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the bulkposting_id refers to the key field in your database table.
        $this->_init('bulkposting/bulkposting', 'bulkposting_id');
    }
}