<?php

class Masterajib_Websiteaudit_Model_Mysql4_Websiteaudit extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the websiteaudit_id refers to the key field in your database table.
        $this->_init('websiteaudit/websiteaudit', 'websiteaudit_id');
    }
}