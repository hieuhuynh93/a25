<?php

class Masterajib_Linkanalysis_Model_Mysql4_Linkanalysis_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('linkanalysis/linkanalysis');
    }
}