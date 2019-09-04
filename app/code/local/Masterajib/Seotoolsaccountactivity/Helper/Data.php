<?php

class Masterajib_Seotoolsaccountactivity_Helper_Data extends Mage_Core_Helper_Abstract {

    public function setUserActivity($arrData) {
        $day = date("d");
        $month = date("m");
        $year = date("y");
        $activityModel = null;
        $activityModelCollection = Mage::getModel('seotoolsaccountactivity/seotoolsaccountactivity')
                ->getCollection()
                ->addFieldToFilter('day', $day)
                ->addFieldToFilter('month', $month)
                ->addFieldToFilter('year', $year)
                ->addFieldToFilter('smallseotools_id', $arrData['smallseotools_id'])
                ->addFieldToFilter('customer_id', $arrData['customer_id']);

        $activity = '';

        if ($activityModelCollection->getSize() == 0) {
            $activityModel = Mage::getModel('seotoolsaccountactivity/seotoolsaccountactivity');
            $arrData['day'] = $day;
            $arrData['month'] = $month;
            $arrData['year'] = $year;
            $activity = $arrData['activity'];
            $arrData['activity'] = $activity;
            $activityModel->setData($arrData);
            $activityModel->setCreatedTime(now());
            $activityModel->save();
            $activityModel = null;
        }
    }

}
