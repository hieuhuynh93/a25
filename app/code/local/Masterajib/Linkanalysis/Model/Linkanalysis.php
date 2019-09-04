<?php

class Masterajib_Linkanalysis_Model_Linkanalysis extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('linkanalysis/linkanalysis');
    }
}