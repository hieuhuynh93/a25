<?php

class Masterajib_Searchextensions_Model_Mysql4_Searchextensions_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('searchextensions/searchextensions');
    }
}