<?php

class Masterajib_Smallseotools_Model_Mysql4_Smallseotools_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('smallseotools/smallseotools');
    }
}