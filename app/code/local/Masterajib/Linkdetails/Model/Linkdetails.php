<?php

class Masterajib_Linkdetails_Model_Linkdetails extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('linkdetails/linkdetails');
    }
}