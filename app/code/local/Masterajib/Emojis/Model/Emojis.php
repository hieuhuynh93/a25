<?php

class Masterajib_Emojis_Model_Emojis extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('emojis/emojis');
    }
}