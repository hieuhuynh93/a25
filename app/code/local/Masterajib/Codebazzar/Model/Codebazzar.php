<?php

class Masterajib_Codebazzar_Model_Codebazzar extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('codebazzar/codebazzar');
    }
}