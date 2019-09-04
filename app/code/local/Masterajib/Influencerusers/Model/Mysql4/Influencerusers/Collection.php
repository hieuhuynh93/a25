<?php

class Masterajib_Influencerusers_Model_Mysql4_Influencerusers_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('influencerusers/influencerusers');
    }
}