<?php

class Masterajib_Codebazzar_Model_Mysql4_Codebazzar_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('codebazzar/codebazzar');
    }
}