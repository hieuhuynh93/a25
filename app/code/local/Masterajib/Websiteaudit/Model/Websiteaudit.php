<?php

class Masterajib_Websiteaudit_Model_Websiteaudit extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('websiteaudit/websiteaudit');
    }
}