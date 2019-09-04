<?php

class Masterajib_Smallseotools_Model_Smallseotools extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('smallseotools/smallseotools');
    }
}