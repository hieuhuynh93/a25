<?php

class Masterajib_Influencer_Model_Mysql4_Influencer extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the influencer_id refers to the key field in your database table.
        $this->_init('influencer/influencer', 'influencer_id');
    }
}