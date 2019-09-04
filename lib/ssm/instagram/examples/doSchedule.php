<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('/var/www/html/app/Mage.php');

Mage::app();

$arrVideoTypes = array("avi", "mp4");
$arrImage = array("jpeg", "jpg", "png", "gif");

$locationLatLong = $_REQUEST['locationLatLong'];
$locationLatLongArr = explode(",", $locationLatLong);

$latitide = '';
$longitude = '';

if (!empty($locationLatLongArr)) {
    $latitide = $locationLatLongArr[0];             //ok
    $longitude = $locationLatLongArr[1];            //ok
}

$commentText = $_REQUEST['commentText'];            //ok

$sliderPollTopic = $_REQUEST['sliderPollTopic'];    //ok

$abPollTopic = $_REQUEST['abtopic'];                //ok
$abPollYes = $_REQUEST['abyes'];                    //ok
$abPollNo = $_REQUEST['abno'];                      //ok

$questionPoll = $_REQUEST['questionPoll'];

$countdown = $_REQUEST['countdowndate'];
$countdowntopic = $_REQUEST['countdowntopics'];

$captionText = $_REQUEST['captiontxt'];
$section = $_REQUEST['section'];
$userId = $_REQUEST['userid'];

$link = $_REQUEST['link'];
$msg = "";

$media_path = array();

$customerId = "";

$scheduledate = $_REQUEST['scheduledate'];
$scheduletime = $_REQUEST['scheduletime'];

$scheduledateArr = explode("-", $_REQUEST['scheduledate']);
$scheduletimeArr = explode(":", $_REQUEST['scheduletime']);

$postFrom = (isset($_REQUEST['post_from']) ? $_REQUEST['post_from'] : '');
(isset($_REQUEST['post_from']) ? $_REQUEST['post_from'] : '');

//----------------- File Manager Starts -------------------
$fileManagerFileIds = $_REQUEST['fileManagerFileIds'];
//----------------- File Manager Ends ---------------------

$media = "";
$mediaId = 0;
if (isset($_REQUEST['media'])) {
    $mediaId = $_REQUEST['media'];
    $media = Mage::getModel('schedulepost/schedulepost')->load($_REQUEST['media'])->getMediaPath();
}
$result = array();

$customerId = "1";

if ($section == 'simple_post') {
    if (isset($_FILES['localfile']['name']) && strlen($_FILES['localfile']['name']) >= 5) {
        $image = $_FILES['localfile']['name'];
        $category = "0" . DS . $customerId;

        $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;
        $uploader = new Mage_Core_Model_File_Uploader(
                array(
            'name' => $_FILES['localfile']['name'],
            'type' => $_FILES['localfile']['type'],
            'tmp_name' => $_FILES['localfile']['tmp_name'],
            'error' => $_FILES['localfile']['error'],
            'size' => $_FILES['localfile']['size']
                )
        );
        //echo "<br>Size: " . $_FILES['localfile']['size'];

        $uploader->setAllowRenameFiles(true);
        $uploader->setFilesDispersion(false);

        $ext = pathinfo($image, PATHINFO_EXTENSION); //getting image extension
        $filename = rand(99999, 9999999999) . "." . $ext;
        $uploader->save($path, $filename);

        $file = '/var/www/html/media/media_library/' . $category . '/' . $filename;

        array_push($media_path, $file);
    }elseif($fileManagerFileIds > 0){
        $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileIds);
        $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();
        array_push($media_path, $file);
    }
    //----------- Need to Remove Ends -------------
} elseif ($section == 'story') {
    if (!empty($_FILES['localfile']['name']) && count(explode(",", $fileManagerFileIds)) == 0) {
        $fileArr = array();
        for ($i = 0; $i < count($_FILES['localfile']['name']); $i++) {
            $image = $_FILES['localfile']['name'][$i];
            $category = "0" . DS . $customerId;

            $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;
            $uploader = new Mage_Core_Model_File_Uploader(
                    array(
                'name' => $_FILES['localfile']['name'][$i],
                'type' => $_FILES['localfile']['type'][$i],
                'tmp_name' => $_FILES['localfile']['tmp_name'][$i],
                'error' => $_FILES['localfile']['error'][$i],
                'size' => $_FILES['localfile']['size'][$i]
                    )
            );
            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(false);

            $ext = pathinfo($image, PATHINFO_EXTENSION); //getting image extension
            $filename = rand(99999, 9999999999) . "." . $ext;
            $uploader->save($path, $filename);

            $file = '/var/www/html/media/media_library/' . $category . '/' . $filename;
            array_push($fileArr, $file);

            array_push($media_path, $file);
        }
    }elseif($fileManagerFileIds != '' || count(explode(",", $fileManagerFileIds)) >= 1){
        $fileManagerFileIdsArr = explode(",", $fileManagerFileIds);
        foreach($fileManagerFileIdsArr as $fileManagerFileId){
            $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileId);
            $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();
            array_push($media_path, $file);
        }
        
        //echo "<pre>"; print_r($fileManager->getData()); die();
    }
} elseif ($section == 'carrousal') {
    //--------------------------------------
    if (!empty($_FILES['localfile']['name']) && count(explode(",", $fileManagerFileIds)) == 0) {
        $fileArr = array();
        for ($i = 0; $i < count($_FILES['localfile']['name']); $i++) {
            $image = $_FILES['localfile']['name'][$i];
            $category = "0" . DS . $customerId;

            $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;
            $uploader = new Mage_Core_Model_File_Uploader(
                    array(
                'name' => $_FILES['localfile']['name'][$i],
                'type' => $_FILES['localfile']['type'][$i],
                'tmp_name' => $_FILES['localfile']['tmp_name'][$i],
                'error' => $_FILES['localfile']['error'][$i],
                'size' => $_FILES['localfile']['size'][$i]
                    )
            );
            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(false);

            $ext = pathinfo($image, PATHINFO_EXTENSION); //getting image extension
            $filename = rand(99999, 9999999999) . "." . $ext;
            $uploader->save($path, $filename);

            $file = '/var/www/html/media/media_library/' . $category . '/' . $filename;
            array_push($fileArr, $file);

            array_push($media_path, $file);
        }
    }elseif($fileManagerFileIds != ''){
        $fileManagerFileIdsArr = explode(",", $fileManagerFileIds);
        foreach($fileManagerFileIdsArr as $fileManagerFileId){
            $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileId);
            $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();
            
            array_push($media_path, $file);
        }
    }
}
//------------------- Schedule Work Start ---------------------

$media = rtrim(ltrim(implode(",", $media_path), ","), ",");
$abPollTopic = implode(",", $abPollTopic);
$abPollYes = implode(",", $abPollYes);
$abPollNo = implode(",", $abPollNo);
$sliderPollTopic = implode(",", $sliderPollTopic);
$questionPoll = implode(",", $questionPoll);
$countdown = implode(",", $countdown);
$countdowntopic = implode(",", $countdowntopic);

if ($scheduledate == $nowDate && $scheduletime == $nowTime) {
    
} elseif ((!empty($scheduledateArr) && !empty($scheduletimeArr)) && $postFrom != "CRON") {

    $year = '2019'; //$scheduledateArr[0];
    $month = number_format($scheduledateArr[1]);
    $day = number_format($scheduledateArr[2]);

    $hour = number_format($scheduletimeArr[0]);
    $minutes = number_format($scheduletimeArr[1]);

    $model = Mage::getModel('schedulepost/schedulepost');
    $model->setCustomerId($customerId);
    $model->setInfluencerusersId($userId);
    $model->setMediaPath($media);
    $model->setCaption($captionText);
    $model->setLatitide($latitide);
    $model->setLongitude($longitude);
    $model->setComment($commentText);
    $model->setPostType($section);
    $model->setYesNoPollTopic($abPollTopic);
    $model->setYesnoTopicYes($abPollYes);
    $model->setYesnoTopicNo($abPollNo);
    $model->setSliderPollTopic($sliderPollTopic);
    $model->setCountdownText($countdowntopic);
    $model->setCountdownStartingDate($countdown);
    $model->setQuestionTopic($questionPoll);
    $model->setScheduledPostDay($day);
    $model->setScheduledPostMonth($month);
    $model->setScheduledPostYear($year);
    $model->setScheduledPostHours($hour);
    $model->setScheduledPostMinutes($minutes);
    $model->setPostStatus('0');
    $model->setStatus('1');
    $model->setCreatedTime(now());
    $model->setUpdateTime(now());
    try {
        $model->save();
        $result['status'] = "ok";
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
    }
}
//------------------- Schedule Work Ends ----------------------

echo json_encode(array('status' => $result['status']));

