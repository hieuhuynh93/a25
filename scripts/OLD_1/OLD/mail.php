<?php

ini_set('display_errors', 'On');
ini_set('max_execution_time', 0);
error_reporting(E_ALL);
require('../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));

try {
    $model = Mage::getModel('websiteaudit/websiteaudit');
    $model->setTitle('Test from script: ' . date("Y-m-d H:i:s"));
    $model->setFilename('1');
    $model->setContent('2');
    $model->setStatus('1');
    $model->setCreatedTime(now());
    $model->setUpdateTime(now());
    $model->save();
} catch (Exception $ex) {
    echo $ex;
}

echo "Script executed Successfully...";

