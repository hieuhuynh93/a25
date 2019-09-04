<?php

class Masterajib_Emailmarketing_Model_Mysql4_Emailmarketing_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('emailmarketing/emailmarketing');
    }
}