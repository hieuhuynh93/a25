<?php

class Masterajib_Seotoolsaccountactivity_Model_Mysql4_Seotoolsaccountactivity extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the accountactivity_id refers to the key field in your database table.
        $this->_init('seotoolsaccountactivity/seotoolsaccountactivity', 'seoactivity_id');
    }
}