<?php

class Masterajib_Emojis_Model_Mysql4_Emojis_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('emojis/emojis');
    }
}