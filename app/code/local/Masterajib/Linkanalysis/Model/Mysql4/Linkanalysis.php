<?php

class Masterajib_Linkanalysis_Model_Mysql4_Linkanalysis extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the linkanalysis_id refers to the key field in your database table.
        $this->_init('linkanalysis/linkanalysis', 'linkanalysis_id');
    }
}