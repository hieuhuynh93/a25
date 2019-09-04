<?php

class Masterajib_Linkdetails_Model_Mysql4_Linkdetails extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the linkdetails_id refers to the key field in your database table.
        $this->_init('linkdetails/linkdetails', 'linkdetails_id');
    }
}