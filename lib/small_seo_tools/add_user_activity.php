<?php 
$arrayRes = [];
if(isset($_POST['activity']))
    $arrayRes['activity'] = $_POST['activity'];
if(isset($_POST['smallseotools_id']))
    $arrayRes['smallseotools_id'] = $_POST['smallseotools_id'];
    
$customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
$arrayRes['customer_id'] = $customerId;
$activityHelper = Mage::helper('seotoolsaccountactivity/data');
$activityHelper->setUserActivity($arrayRes);
echo "Called and Added";
?>