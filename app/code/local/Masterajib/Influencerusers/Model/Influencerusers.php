<?php

class Masterajib_Influencerusers_Model_Influencerusers extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('influencerusers/influencerusers');
    }
}