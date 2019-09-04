<?php

class Masterajib_Accountactivity_Helper_Data extends Mage_Core_Helper_Abstract {

    public function setUserActivity($arrData) {
        $day = date("d");
        $month = date("m");
        $year = date("y");
        $activityModel = null;
        $activityModelCollection = Mage::getModel('accountactivity/accountactivity')
                ->getCollection()
                ->addFieldToFilter('day', $day)
                ->addFieldToFilter('month', $month)
                ->addFieldToFilter('year', $year)
                ->addFieldToFilter('customer_id', $arrData['customer_id']);

        $activity = '';

        if ($activityModelCollection->getSize() > 0) {
            foreach ($activityModelCollection as $activityModelColl) {
                $activityModel = Mage::getModel('accountactivity/accountactivity')->load($activityModelColl->getId());
                $activity = $activityModel->getActivity();
                if (strlen($activity) >= 3) {
                    $activity = $activity . ", " . $arrData['activity'] . now();
                }
                $arrData['activity'] = $activity;
                $arrData['accountactivity_id'] = $activityModel->getId();
                $activityModel->setData($arrData);
                $activityModel->setUpdateTime(now());
                $activityModel->save();
                $activityModel = null;
            }
        } else {
            $activityModel = Mage::getModel('accountactivity/accountactivity');
            $arrData['day'] = $day;
            $arrData['month'] = $month;
            $arrData['year'] = $year;
            $activity = $arrData['activity'] . now();
            $arrData['activity'] = $activity;
            $activityModel->setData($arrData);
            $activityModel->setUpdateTime(now());
            $activityModel->save();
            $activityModel = null;
        }
    }

}
