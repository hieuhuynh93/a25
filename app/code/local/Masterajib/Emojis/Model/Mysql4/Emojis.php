<?php

class Masterajib_Emojis_Model_Mysql4_Emojis extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the emojis_id refers to the key field in your database table.
        $this->_init('emojis/emojis', 'emojis_id');
    }
}