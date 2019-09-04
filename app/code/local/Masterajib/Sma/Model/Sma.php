<?php

class Masterajib_Sma_Model_Sma extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('sma/sma');
    }
}