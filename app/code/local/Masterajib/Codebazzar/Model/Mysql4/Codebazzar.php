<?php

class Masterajib_Codebazzar_Model_Mysql4_Codebazzar extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the codebazzar_id refers to the key field in your database table.
        $this->_init('codebazzar/codebazzar', 'codebazzar_id');
    }
}