<?php

class Masterajib_Keywords_Model_Mysql4_Keywords_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('keywords/keywords');
    }
}