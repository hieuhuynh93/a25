<?php

class Masterajib_Filemanager_Model_Filemanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('filemanager/filemanager');
    }
}