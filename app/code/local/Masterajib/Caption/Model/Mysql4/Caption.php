<?php

class Masterajib_Caption_Model_Mysql4_Caption extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the caption_id refers to the key field in your database table.
        $this->_init('caption/caption', 'caption_id');
    }
}