<?php

class Masterajib_Servicemanagement_Model_Mysql4_Servicemanagement_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('servicemanagement/servicemanagement');
    }
}