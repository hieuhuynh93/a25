<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../../../app/Mage.php');
//Mage::init();
//Mage::setIsDeveloperMode(true);
//Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

Mage::app();
Mage::getSingleton("core/session", array("name" => "frontend"));
$session = Mage::getSingleton("customer/session");

include_once("instagram-photo-video-upload-api.class.php");

$customUserId = $_REQUEST['customUserId'];
$captiontxt = $_REQUEST['captiontxt'];
$files = array_reverse(explode(",", rtrim(ltrim($_REQUEST['files'], ","), ",")));

if ($session->isLoggedIn()) {
    $customerData = $session->getCustomer();
    $customerId = $customerData->getId();
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
        $uploader->setAllowRenameFiles(true);
        $uploader->setFilesDispersion(false);

        $ext = pathinfo($image, PATHINFO_EXTENSION); //getting image extension
        $filename = rand(99999, 9999999999) . "." . $ext;
        $uploader->save($path, $filename);
        //-----------------------------------------
        $model = Mage::getModel('filemanager/filemanager');
        $model->setCustomerId($customerId);
        $model->setCategoryIds('0');
        $model->setUploadType($ext);
        $model->setFilename($category . DS . $filename);
        $model->setStatus('1');
        $model->setCreatedAt(now());
        $model->setUpdateAt(now());
        $model->save();
        //----------------------------------------
        $file = '/var/www/html/media/media_library/' . $category . '/' . $filename;
    } else {
        $file = '/var/www/html/media/media_library/' . $files[0];
    }
    $customUserIdArr = explode(",", $customUserId);
    foreach ($customUserIdArr as $customUserId) {
        $modelUser = Mage::getModel('influencerusers/influencerusers')->load($customUserId);

        $arr['USERNAME'] = $modelUser->getUsername();
        $arr['PASSWORD'] = $modelUser->getPassword();
        $arr['ACCESS_TOKEN'] = $modelUser->getAuthorizedKey();

        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $arrImages = array("jpg", "png");
        $arrVideos = array("mp4", "avi");
        if (in_array($ext, $arrImages)) {
            $obj = new InstagramUpload();
            $obj->Login($arr['USERNAME'], $arr['PASSWORD']);
            $obj->UploadPhoto($file, $captiontxt);
        } elseif (in_array($ext, $arrVideos)) {
            $obj = new InstagramUpload();
            //----------------------------------------
            $video = $file;
            $randomNum = rand(10000, 100000);
            $thumbnail = $randomNum . '.jpg';
            shell_exec("ffmpeg -i $video -deinterlace -an -ss 10 -t 00:00:10 -r 1 -y -vcodec mjpeg -f mjpeg $thumbnail 2>&1");

            //----------------------------------------
            $obj->Login($arr['USERNAME'], $arr['PASSWORD']);
            $obj->UploadVideo($file, $thumbnail, $captiontxt);
            //$obj->UploadVideo($file, "", $captiontxt);
            shell_exec("rm -rf " . $thumbnail);
        }
    }
} else {
    echo "Session expire, Please login.";
}




// Upload Photo
// Upload Video
/*  */
?>