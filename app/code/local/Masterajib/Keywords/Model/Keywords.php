<?php

class Masterajib_Keywords_Model_Keywords extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('keywords/keywords');
    }
}