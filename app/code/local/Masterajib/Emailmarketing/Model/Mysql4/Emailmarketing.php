<?php

class Masterajib_Emailmarketing_Model_Mysql4_Emailmarketing extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the emailmarketing_id refers to the key field in your database table.
        $this->_init('emailmarketing/emailmarketing', 'emailmarketing_id');
    }
}