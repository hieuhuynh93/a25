<?php

class Masterajib_Websiteaudit_Model_Mysql4_Websiteaudit_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('websiteaudit/websiteaudit');
    }
}