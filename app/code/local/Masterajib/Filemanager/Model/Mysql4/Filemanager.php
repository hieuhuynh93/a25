<?php

class Masterajib_Filemanager_Model_Mysql4_Filemanager extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the filemanager_id refers to the key field in your database table.
        $this->_init('filemanager/filemanager', 'filemanager_id');
    }
}