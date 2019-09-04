<?php

class Masterajib_Keywordmanager_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getCurrentCustomer() {
        $customerId = 0;
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
        }else{
            $url = Mage::getUrl('customer/account/login');
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        }
        return $customerId;
    }

}
