<?php

class Masterajib_Caption_Model_Mysql4_Caption_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('caption/caption');
    }
}