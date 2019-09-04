<?php

class Masterajib_Graph_Model_Mysql4_Graph_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('graph/graph');
    }
}