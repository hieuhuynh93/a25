<?php

class Masterajib_Influencer_Model_Influencer extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('influencer/influencer');
    }
}