<?php

class Masterajib_Admanagement_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('admanagement')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('admanagement')->__('Disabled')
        );
    }
}