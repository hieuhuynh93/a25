<?php

ini_set('display_errors', 1);
set_time_limit(0);
$msg = '';
require('/var/www/html/app/Mage.php');
Mage::init();
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$date = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
$formatedDateAndTime = $date->format('Y-m-d H:i:s');

$year = $date->format('Y');
$month = number_format($date->format('m'));
$day = number_format($date->format('d'));
$hour = number_format($date->format('H'));
$minutes = number_format($date->format('i'));

$schedulePostCollection = Mage::getModel('schedulepost/schedulepost')
        ->getCollection()
        ->addFieldToFilter('scheduled_post_day', $day)
        ->addFieldToFilter('scheduled_post_month', $month)
        ->addFieldToFilter('scheduled_post_year', $year)
        ->addFieldToFilter('scheduled_post_hours', $hour)
        //->addFieldToFilter('scheduled_post_minutes', $minutes)
        ->addFieldToFilter('post_status', '0')
        ->addFieldToFilter('status', '1');

//echo "<pre>"; print_r($schedulePostCollection->getData()); die();


if (!empty($schedulePostCollection)) {
    foreach ($schedulePostCollection as $schedulePost) {
        $influencerusers_id = $schedulePost->getInfluencerusersId();
        $caption = $schedulePost->getCaption();                 //Done
        $latitide = $schedulePost->getLatitide();               //Done
        $longitude = $schedulePost->getLongitude();             //Done
        $comment = $schedulePost->getComment();                 //Done
        $post_type = $schedulePost->getPostType();
        $yes_no_poll_topic = $schedulePost->getYesNoPollTopic();
        $yesno_topic_yes = $schedulePost->getYesnoTopicYes();
        $yesno_topic_no = $schedulePost->getYesnoTopicNo();
        $slider_poll_topic = $schedulePost->getSliderPollTopic();
        $countdown_text = $schedulePost->getCountdownText();
        $countdown_starting_date = $schedulePost->getCountdownStartingDate();
        $question_topic = $schedulePost->getQuestionTopic();
        //$media = $schedulePost->getMediaPath();
        $media = $schedulePost->getId();
        
        $scheduledMinute = $schedulePost->getScheduledPostMinutes();
        //-------------- Call Curl for Posting Starts -------------
        if ($minutes >= $scheduledMinute && $schedulePost->getPostStatus() == 0) {
            $comment = str_replace(' ', '%20', $comment);
            $caption = str_replace(' ', '%20', $caption);
            $url = urldecode('https://www.socicos.com/lib/ssm/instagram/examples/doPost.php?section=' . $post_type . '&captiontxt=' . $caption . '&userid=' . $influencerusers_id . '&media=' . $media . '&post_from=CRON&commentText=' . $comment . '&locationLatLong=' . $latitide . ',' . $longitude);
            //if($post_type == 'story'){
                //$url = urldecode('https://www.socicos.com/lib/ssm/instagram/examples/doPost.php?section=' . $post_type . '&captiontxt=' . $caption . '&userid=' . $influencerusers_id . '&media=' . $media . '&post_from=CRON&commentText=' . $comment . '&locationLatLong=' . $latitide . ',' . $longitude . '&abtopic=' . $yes_no_poll_topic . '&abyes=' . $yesno_topic_yes . '&abno=' . $yesno_topic_no . '&questionPoll=' . $question_topic . '&sliderPollTopic=' . $slider_poll_topic . '&countdowntopics=' . $countdown_text . '&countdowndate=' . $countdown_starting_date);
            //}
            $url = rtrim($url, ",");
            $url = str_replace(' ', '%20', $url);
            $res = getContent($url);
            try {
                $model = Mage::getModel('schedulepost/schedulepost')->load($schedulePost->getId());
                $model->setPostStatus('1');
                $model->save();
            } catch (Exception $ex) {
                
            }
        }else{
            
        }


        //---------------------------------------------------------
    }
}

function getContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $body = curl_exec($ch);
    curl_close($ch);

    return $body;
}

?>