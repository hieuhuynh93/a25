<?php

class Masterajib_Searchextensions_Model_Searchextensions extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('searchextensions/searchextensions');
    }
}