<?php

class Masterajib_Pagebuilder_Model_Mysql4_Pagebuilder_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('pagebuilder/pagebuilder');
    }
}