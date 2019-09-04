<?php

class Masterajib_Pagebuilder_Model_Pagebuilder extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('pagebuilder/pagebuilder');
    }
}