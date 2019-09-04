<?php

class Masterajib_Pagebuilder_Model_Mysql4_Pagebuilder extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the pagebuilder_id refers to the key field in your database table.
        $this->_init('pagebuilder/pagebuilder', 'pagebuilder_id');
    }
}