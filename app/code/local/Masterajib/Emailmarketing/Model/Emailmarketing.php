<?php

class Masterajib_Emailmarketing_Model_Emailmarketing extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('emailmarketing/emailmarketing');
    }
}