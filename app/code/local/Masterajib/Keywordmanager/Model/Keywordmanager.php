<?php

class Masterajib_Keywordmanager_Model_Keywordmanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('keywordmanager/keywordmanager');
    }
}