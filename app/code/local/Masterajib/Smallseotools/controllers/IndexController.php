<?php

class Masterajib_Smallseotools_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function createArticalAction(){
        $dataRaw = $_REQUEST['dataRaw'];
        $helperSmallseotools = Mage::helper('smallseotools/data');
        
        $userInput = stripslashes($dataRaw);
        //$regUserInput = truncate($userInput,30,150);
        $spinned = $helperSmallseotools->spinMyData($userInput, 'en');
        $spinned_data = $helperSmallseotools->randomSplit($spinned);
        $spinned_data = preg_replace_callback('/([.!?]\s*\w)/', function($m) {
            return strtoupper(strlen($m[1]) ? "$m[1]$m[2]" : $m[2]);
        }, $spinned_data);
        $spinned_data = implode(PHP_EOL, array_map("ucfirst", explode(PHP_EOL, $spinned_data)));
        $spinned_data = ucfirst($spinned_data);
        
        echo $spinned_data;
    }

    public function indexAction() {
        //------------------ Account Activity Link Anaysis --------------
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $activityHelper = Mage::helper('accountactivity/data');
        $data['activity'] = 'Small SEO Tools ';
        $data['small_seo_tools'] = '1';
        $data['customer_id'] = $customerId;
        $data['created_time'] = now();
        $activityHelper->setUserActivity($data);
        //--------------------------------------------------------------
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function addSEOUserActivityAction(){
        $arrayRes = [];
        if(isset($_POST['activity']))
            $arrayRes['activity'] = $_POST['activity'];
        if(isset($_POST['smallseotools_id']))
            $arrayRes['smallseotools_id'] = $_POST['smallseotools_id'];
            
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $arrayRes['customer_id'] = $customerId;
        $activityHelper = Mage::helper('seotoolsaccountactivity/data');
        $activityHelper->setUserActivity($arrayRes);
    }
}
