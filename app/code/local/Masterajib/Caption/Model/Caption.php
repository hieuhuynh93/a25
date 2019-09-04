<?php

class Masterajib_Caption_Model_Caption extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('caption/caption');
    }
}