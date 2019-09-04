<?php

class Masterajib_Graph_Model_Graph extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('graph/graph');
    }
}