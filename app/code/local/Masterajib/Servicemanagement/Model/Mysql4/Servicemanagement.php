<?php

class Masterajib_Servicemanagement_Model_Mysql4_Servicemanagement extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the servicemanagement_id refers to the key field in your database table.
        $this->_init('servicemanagement/servicemanagement', 'servicemanagement_id');
    }
}