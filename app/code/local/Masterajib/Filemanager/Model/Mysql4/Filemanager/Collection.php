<?php

class Masterajib_Filemanager_Model_Mysql4_Filemanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('filemanager/filemanager');
    }
}