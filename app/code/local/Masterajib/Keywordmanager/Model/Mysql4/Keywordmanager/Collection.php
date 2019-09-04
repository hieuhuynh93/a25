<?php

class Masterajib_Keywordmanager_Model_Mysql4_Keywordmanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('keywordmanager/keywordmanager');
    }
}