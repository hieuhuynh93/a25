<?php

class Masterajib_Bulkposting_Model_Bulkposting extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bulkposting/bulkposting');
    }
}