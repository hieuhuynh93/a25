<?php

class Masterajib_Cron_Model_Cron extends Mage_Core_Model_Abstract
{
    public function crontask()
  {
    try {
    $model = Mage::getModel('websiteaudit/websiteaudit');
    $model->setTitle('Test: ' . date("Y-m-d H:i:s"));
    $model->setFilename('1');
    $model->setContent('2');
    $model->setStatus('1');
    $model->setCreatedTime(now());
    $model->setUpdateTime(now());
    $model->save();
} catch (Exception $ex) {
    echo $ex;
}
  }
}
