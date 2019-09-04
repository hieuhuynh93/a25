<?php

class Masterajib_Admanagement_Model_Mysql4_Admanagement_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('admanagement/admanagement');
    }
}