<?php

class Masterajib_Admanagement_Model_Admanagement extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('admanagement/admanagement');
    }
}