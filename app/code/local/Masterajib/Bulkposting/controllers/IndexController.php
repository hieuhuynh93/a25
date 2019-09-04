<?php

class Masterajib_Bulkposting_IndexController extends Mage_Core_Controller_Front_Action {

    public function deleteschedulepostAction() {
        $schedulePostId = $_REQUEST['schedulePostId'];
        $userIds = $_REQUEST['userIds'];
        $schedulepostmodel = Mage::getModel('schedulepost/schedulepost')->load($schedulePostId);
        try {
            $schedulepostmodel->delete();
        } catch (Exception $ex) {
            
        }
        $html = $this->getUser($userIds);
        echo $html;
    }

    public function saveparttwoAction() {
        $fileuploadmedium = $_REQUEST['fileuploadmedium'];
        $bulkpostid = $_REQUEST['bulkpostid'];
        $status = 0;
        $path = '';
        $file = '';
        $socicoscategoryid = '';
        $filetype = $_REQUEST['filetype'];
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();

        if ($fileuploadmedium == 1) {
            $randomFolderName = rand(99999, 9999999999);
            $zipfilename = $_FILES['localfile']['name'];
            $category = "bulkposting" . DS . $customerId . DS . $randomFolderName;
            $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;
            if (isset($_FILES['localfile']['name']) && strlen($_FILES['localfile']['name']) >= 5) {
                $image = $_FILES['localfile']['name'];
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

                //$file = '/var/www/html/media/media_library/' . $category . '/' . $filename;
                $file = $path . $filename;

                $filecount = 0;
                $zip_dir = $path;
                $zip = zip_open($file);
                if ($zip) {
                    while ($zip_entry = zip_read($zip)) {

                        $file = basename(zip_entry_name($zip_entry));
                        $fp = fopen($zip_dir . basename($file), "w+");

                        if (zip_entry_open($zip, $zip_entry, "r")) {
                            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                            zip_entry_close($zip_entry);
                        }

                        fwrite($fp, $buf);
                        fclose($fp);
                        $filecount++;
                        //echo "The file " . $file . " was extracted to dir " . $zip_dir . "\n<br>";
                    }
                    zip_close($zip);
                    //unlink($file);
                }
            }
        } elseif ($fileuploadmedium == 2) {
            $socicoscategoryid = $_REQUEST['socicos_category'];
            $path = "/var/www/html/media/media_library/" . $socicoscategoryid . DS;
            $filecount = count(scandir($path));
        }

        //echo "Socicos Category: " . $socicoscategoryid; die();

        $bulkpostmodel = Mage::getModel('bulkposting/bulkposting')->load($bulkpostid);
        if (!empty($bulkpostmodel)) {
            $bulkpostmodel->setFolderName($path);
            $bulkpostmodel->setFilename($file);
            $bulkpostmodel->setSocicosCategoryId($socicoscategoryid);
            $bulkpostmodel->setMediaType(filetype);
            $bulkpostmodel->setSocicosCategoryId($socicoscategoryid);
            try {
                $bulkpostmodel->save();
                $status = 1;
            } catch (Exception $ex) {
                
            }
        } else {
            $msg = "For part - 1 is empty!";
        }

        $filecount = $filecount - 1;
        echo json_encode(
                array(
                    'status' => $status,
                    'msg' => $msg,
                    'nooffiles' => $filecount
                )
        );
    }

    public function savepartoneAction() {
        $userIds = $_REQUEST['userIds'];                    //Done
        $posttype = $_REQUEST['posttype'];                  //Done
        $bulkpostlocation = $_REQUEST['bulkpostlocation'];
        $addtoinfluencer = $_REQUEST['addtoinfluencer'];
        $livestreaming = $_REQUEST['livestreaming'];
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();   //Done

        $msg = '';
        $status = 0;
        $bulkpostid = '';

        $bulkpostmodel = Mage::getModel('bulkposting/bulkposting');
        $bulkpostmodel->setCustomerId($userIds);
        $bulkpostmodel->setInfluencerUserIds($userIds);
        $bulkpostmodel->setPostType($posttype);
        $bulkpostmodel->setAddtoinfluencer($addtoinfluencer);
        $bulkpostmodel->setLivestreaming($livestreaming);
        try {
            $bulkpostmodel->save();
            $bulkpostid = $bulkpostmodel->getId();
            $status = 1;
        } catch (Exception $ex) {
            $msg = $ex;
        }

        echo json_encode(
                array(
                    'status' => $status,
                    'msg' => $msg,
                    'bulkpostid' => $bulkpostid
                )
        );
    }

    public function getbulkscheduledetailsAction() {
        $date = $_REQUEST['date'];
        $arrDate = explode("-", $date);
        $year = $arrDate[0];
        $month = number_format($arrDate[1]);
        $day = number_format($arrDate[2]);
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();

        $schedulepostCollection = Mage::getModel('schedulepost/schedulepost')
                ->getCollection()
                ->addFieldToFilter('customer_id', $customerId)
                ->addFieldToFilter('scheduled_post_day', $day)
                ->addFieldToFilter('scheduled_post_month', $month)
                ->addFieldToFilter('post_from', '<span class="badge badge-info">Bulk Posting</span>')
                ->addFieldToFilter('scheduled_post_year', $year)
                ->addFieldToFilter('status', '1');

        $htmlList = '';

        $htmlList .= '<div class="card card-statistics h-100">
                        <div class="card-body">
                            <h6 class="card-title">Bulkposting Date: ' . $day . '-' . $month . '-' . $year . '</h6>
                            <ul class="list-unstyled">';

        foreach ($schedulepostCollection as $schedulepost) {
            $post_status = $schedulepost->getPostStatus();
            $day = $schedulepost->getScheduledPostDay();
            $month = $schedulepost->getScheduledPostMonth();
            $year = $schedulepost->getScheduledPostYear();
            $hours = $schedulepost->getScheduledPostHours();
            $ampm = "AM";
            if ($hours > 12) {
                $hours = $hours - 12;
                $ampm = "PM";
            }
            $minute = $schedulepost->getScheduledPostMinutes();
            $igUserCollection = Mage::getModel('influencerusers/influencerusers')->load($schedulepost->getInfluencerusersId());
            $htmlList .= '<li class="mb-20">
                            <div class="media">
                                <div class="position-relative">
                                    <img class="img-fluid mr-15 avatar-small" src="' . $igUserCollection->getProfilePicture() . '" alt="">
                                </div> 
                                <div class="media-body">
                                    <h6 class="mt-0 mb-0">' . $day . '-' . $month . '-' . $year . ' | ' . $hours . ':' . $minute . ' ' . $ampm . '
                                        <span class="float-right text-danger"> ' . ($post_status == '1' ? '<span class="badge badge-success" style="font-size: .75rem;">Completed</span>' : '<span class="badge badge-warning" style="font-size: .75rem;">Pending</span>') . '</span>  
                                    </h6>
                                    <p style="float: left;"><span style="margin-top: 8px;" class="badge badge-info">' . $igUserCollection->getUsername() . '</span> </p>
                                    <span style="float: right;">
                                        <a style="border-radius: 5px;float:right; margin: 1px;" href="#" class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-eye" style="font-size:15px"></i>
                                        </a>
                                        <a style="border-radius: 5px;float:right; margin: 1px;" href="#" class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-trash-o" style="font-size:15px;"></i>
                                        </a>
                                        <a style="border-radius: 5px;float:right; margin: 1px;" href="#" class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-edit" style="font-size:15px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="divider dotted mt-20"></div>
                        </li>';
        }
        $htmlList .= '</ul>
                </div>
            </div>
        </div>';
        echo $htmlList;
    }

    public function scandirAction() {
        $dir = "/var/www/html/media/media_library/bulkposting/1/5078124779/";
        $arrFiles = scandir($dir);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        echo "<pre>";
        print_r($arrFiles);
    }

    public function getHTML($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $body = curl_exec($ch);
        curl_close($ch);
        return $body;
    }

    public function deletebulkpostAction() {
        $bulkPostId = $_REQUEST['bulkPostId'];
        $status = 0;
        $msg = "";
        $modelBulkPosting = Mage::getModel('bulkposting/bulkposting')->load($bulkPostId);
        $schedulePostCollection = Mage::getModel('schedulepost/schedulepost')
                ->getCollection()
                ->addFieldToFilter('bulkposting_id', $bulkPostId);

        try {

            foreach ($schedulePostCollection as $schedulePost) {
                Mage::getModel('schedulepost/schedulepost')->load($schedulePost->getId())->delete();
            }

            $modelBulkPosting->delete();
            $status = 1;
            $msg = "Successfully Deleted";
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
        }

        //$url = Mage::getBaseUrl() . 'bulk-posting';
        $url = 'https://www.socicos.com/index.php/bulk-posting/';
        $html = $this->getHTML($url);
        echo json_encode(array(
            'status' => $status,
            'msg' => $msg,
            'html' => $html
                )
        );
    }

    public function saveandcreatebulkpostAction() {

        $bulk_post_id = $_REQUEST['bulk_post_id'];
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();
        $modelBulkPosting = Mage::getModel('bulkposting/bulkposting')->load($bulk_post_id);
        $commenttxt = $_REQUEST['commenttxt'];

        $modelBulkPosting->setTotalPost($noOfPostPerDay);
        if ($modelBulkPosting->getPostType() == "simple_post") {
            $modelBulkPosting->setNoOfImagesPerPost('1');
        } elseif ($modelBulkPosting->getPostType() == "story") {
            $modelBulkPosting->setNoOfImagesPerPost('1');
        } elseif ($modelBulkPosting->getPostType() == "carrousal") {
            $modelBulkPosting->setNoOfImagesPerPost('2');
        }


        $noOfImagesInFolder = $_REQUEST['noOfImagesInFolder'];  //Total Media   8
        $noOfPostPerDay = $_REQUEST['totalNoOfPost'];           //No Of Post Per Day    3
        $totalNoOfDays = $_REQUEST['totalNoOfDays'];            //Valid For 3 Days

        $durationInMinutes = (24 / $noOfPostPerDay) * 60;

        $modelBulkPosting->setSchedulePost($durationInMinutes);
        $modelBulkPosting->setNoOfDays($totalNoOfDays);
        $modelBulkPosting->setStatus('1');
        try {
            $modelBulkPosting->save();
        } catch (Exception $ex) {
            
        }

        $arrInfluencerUserIds = explode(",", $modelBulkPosting->getInfluencerUserIds());
        $date = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
        $formatedDateAndTime = $date->format('Y-m-d H:i');

        $nowtime = explode(" ", $formatedDateAndTime)[1];

        $i = 0;

        $todayDate = explode(" ", $formatedDateAndTime)[0];
        $endDate = date('Y-m-d', strtotime($todayDate . ' + ' + $totalNoOfDays + ' days'));

        //foreach ($arrInfluencerUserIds as $influencerUserId) {
        for ($totalNoOfDay = 1; $totalNoOfDay <= $totalNoOfDays; $totalNoOfDay++) {
            for ($noOfPost = 1; $noOfPost <= $noOfPostPerDay; $noOfPost++) {
                if ($todayDate <= $endDate) {
                    $time = new DateTime($formatedDateAndTime);
                    $minutes_to_add = $durationInMinutes;
                    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                    $stamp = $time->format('Y-m-d H:i');
                    $formatedDateAndTime = $stamp;

                    $year = $time->format('Y');
                    $month = number_format($time->format('m'));
                    $day = number_format($time->format('d'));
                    $hour = number_format($time->format('H'));
                    $minutes = number_format($time->format('i'));
                    $dir = $modelBulkPosting->getFolderName();
                    $arrFiles = array_slice(scandir($dir), 2);
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $arrSupportedFiles = array('jpg', 'jpeg', 'mp4', 'gif');

                    foreach ($arrInfluencerUserIds as $influencerUserId) {
                        $extOfMedia = pathinfo($dir . $arrFiles[$i], PATHINFO_EXTENSION);
                        if (in_array($extOfMedia, $arrSupportedFiles)) {
                            $model = Mage::getModel('schedulepost/schedulepost');
                            $model->setBulkpostingId($modelBulkPosting->getId());
                            $model->setCustomerId($customerId);
                            $model->setInfluencerusersId($influencerUserId);
                            $model->setMediaPath($dir . $arrFiles[$i]);
                            $model->setComment($commenttxt);
                            $model->setPostType($modelBulkPosting->getPostType());
                            $model->setScheduledPostDay($day);
                            $model->setScheduledPostMonth($month);
                            $model->setScheduledPostYear($year);
                            $model->setScheduledPostHours($hour + $duration);
                            $model->setScheduledPostMinutes($minutes);
                            $model->setPostStatus("0");
                            $model->setStatus("1");
                            $model->setPostFrom('<span class="badge badge-info">Bulk Posting</span>');
                            $model->setCreatedTime(now());
                            $model->setUpdateTime(now());
                            try {
                                $model->save();
                            } catch (Exception $ex) {
                                
                            }
                        }
                    }
                    $i++;
                }
            }
        }
        //}
        //---------------- Create Scheduling Ends ------------------
    }

    public function savebulkpostAction() {
        $userIds = $_REQUEST['userIds'];
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();
        $posttype = $_REQUEST['posttype'];
        $comment = $_REQUEST['captiontxt'];

        $status = 0;
        $msg = "";

        $file = "";

        $bulk_post_id = "";
        $randomFolderName = rand(99999, 9999999999);
        $category = "bulkposting" . DS . $customerId . DS . $randomFolderName;
        $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;

        $noOfImagesInsideZipFolder = 100;

        if (isset($_FILES['localfile']['name']) && strlen($_FILES['localfile']['name']) >= 5) {
            $image = $_FILES['localfile']['name'];
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

            //$file = '/var/www/html/media/media_library/' . $category . '/' . $filename;
            $file = $path . $filename;
        }

        $scheduledPost = 0;
        $totalPost = ($noOfImagesInsideZipFolder / $totalNoOfPost);
        $totalPostPerDay = ($noOfImagesInsideZipFolder / $totalNoOfPost) / 365;
        if ($totalPostPerDay >= 1) {
            $scheduledPost = round($totalPostPerDay / 24);
        } else {
            $scheduledPost = 1;
        }

        $modelBulkPosting = Mage::getModel('bulkposting/bulkposting');
        $modelBulkPosting->setCustomerId($customerId);
        $modelBulkPosting->setInfluencerUserIds($userIds);
        $modelBulkPosting->setPostType($posttype);
        $modelBulkPosting->setFolderName($path);
        $modelBulkPosting->setFilename($file);
        $modelBulkPosting->setTotalPost($totalPost);
        $modelBulkPosting->setNoOfImagesPerPost($totalNoOfPost);
        $modelBulkPosting->setSchedulePost($scheduledPost);
        $modelBulkPosting->setStatus('1');
        $modelBulkPosting->setCreatedTime(now());
        $modelBulkPosting->setUpdateTime(now());

        try {
            $modelBulkPosting->save();
            $bulk_post_id = $modelBulkPosting->getId();
            $status = 1;
            $msg = "Bulk posting created successfully...";
        } catch (Exception $ex) {
            
        }

        //---------------------------------------
        $filecount = 0;
        $zip_dir = $path;
        $zip = zip_open($file);
        if ($zip) {
            while ($zip_entry = zip_read($zip)) {

                $file = basename(zip_entry_name($zip_entry));
                $fp = fopen($zip_dir . basename($file), "w+");

                if (zip_entry_open($zip, $zip_entry, "r")) {
                    $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                    zip_entry_close($zip_entry);
                }

                fwrite($fp, $buf);
                fclose($fp);
                $filecount++;
                //echo "The file " . $file . " was extracted to dir " . $zip_dir . "\n<br>";
            }
            zip_close($zip);
            //unlink($file);
        }

        /* $zip = new ZipArchive;
          $your_desired_dir = "/var/www/html/media/media_library/bulkposting/1/";
          if ($zip->open($file) === TRUE) {
          $zip->extractTo($your_desired_dir);
          $zip->close();
          foreach (glob($your_desired_dir . DIRECTORY_SEPARATOR . 'Test_Zip') as $file) {
          $finfo = pathinfo($filecus);
          rename($filecus, $your_desired_dir . DIRECTORY_SEPARATOR . $finfo['basename']);
          }
          unlink($your_desired_dir . DIRECTORY_SEPARATOR . 'Test_Zip');
          echo 'ok';
          } else {
          echo 'failed';
          } */
        //---------------------------------------
        echo json_encode(array(
            'status' => $status,
            'filecount' => $filecount,
            'msg' => $msg,
            'bulk_post_id' => $bulk_post_id,
            'path' => $path
                )
        );
    }

    public function getUser($userId) {
        $status = 0;
        $html = '';
        $htmlLi = '';
        $userIds = explode(",", $userId);
        $userId = "'" . $userId . "'";
        foreach ($userIds as $id) {
            $igUser = Mage::getModel('influencerusers/influencerusers')->load($id);
            $schedulepostCollection = Mage::getModel('schedulepost/schedulepost')
                    ->getCollection()
                    ->addFieldToFilter('influencerusers_id', $id)
                    ->addFieldToFilter('status', '1')
                    //->setOrder('created_time', 'DESC');
                    ->setOrder('scheduled_post_day', 'ASC');
            if (!empty($schedulepostCollection)) {

                foreach ($schedulepostCollection as $schedulepost) {
                    $postFrom = $schedulepost->getPostFrom();
                    $postStatus = '';

                    $hours = $schedulepost->getScheduledPostHours();
                    $amPm = '';
                    if ($hours >= 12) {
                        $hours = $hours - 12;
                        $amPm = "PM";
                    } else {
                        $amPm = "AM";
                    }
                    
                    $previewLink = '';
                    if($schedulepost->getPostType() == 'simple_post'){
                        $previewLink = 'https://www.instagram.com/p/'.$schedulepost->getResponse();
                    }elseif($schedulepost->getPostType() == 'story'){
                        $previewLink = 'https://www.instagram.com/stories/'.$igUser->getUsername().'/';
                    }

                    $postTime = $schedulepost->getScheduledPostDay() . ' - ' . $schedulepost->getScheduledPostMonth() . ' - ' . $schedulepost->getScheduledPostYear() . ' -  | ' . $hours . ':' . $schedulepost->getScheduledPostMinutes() . ' ' . $amPm;
                    if ($schedulepost->getPostStatus() == 0) {
                        $postStatus = '<span class="badge badge-warning" style="margin-left:2px;">Pending</span>';
                    } else {
                        $postStatus = '<span class="badge badge-success" style="margin-left:2px;">Completed</span><a title="View on Instagram" style="margin-left: 3px;" target="_blank" href="'.$previewLink.'"><i class="fa fa-instagram" style="font-size:18px"></i></a>';
                    }

                    $toPostFile = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . substr($schedulepost->getMediaPath(), 14);
                    $ext = pathinfo($toPostFile, PATHINFO_EXTENSION);

                    $arrImage = array('jpg', 'jpeg', 'png', 'gif');
                    $arrVideo = array('mp4', 'mpeg', 'avi');
                    if (in_array($ext, $arrImage)) {
                        $toPostFile = '<img src="' . $toPostFile . '" width="55" style="border: solid 1px #ccc; padding: 1px;">';
                    } elseif (in_array($ext, $arrVideo)) {
                        $toPostFile = '<video controls="" width="55" style="border: solid 1px #ccc; padding: 1px;"><source src="' . $toPostFile . '" type="video/mp4"><div class="file-preview-other"><span class="file-icon-4x"><i class="glyphicon glyphicon-file"></i></span></div></video>';
                    }

                    $htmlLi .= '<li class="mb-20">
                                <div class="media">
                                    <div class="position-relative">
                                        <!--<img style="width:35px;" class="img-fluid mr-15 avatar-small" src="' . (strlen($igUser->getLocalProfileImage()) >= 4 ? $igUser->getLocalProfileImage() : $igUser->getProfilePicture()) . '" alt="">-->
                                        <p style="text-align: left; padding-right: 5px; padding-top: 8px;">' . $toPostFile . '</p>
                                    </div> 
                                    <div class="media-body" style="text-align: left; padding-left: 5px;">
                                        <h6 class="mt-0 mb-0" style="font-size: 1rem;">' . strtoupper(str_replace("_", " ", $schedulepost->getPostType())) . ' | ' . (strlen($postFrom) >= 10 ? '<span class="badge badge-info">BP</span>' : '') . $postStatus . ' </h6>
                                        <p>' . $igUser->getUsername() . ' </p>
                                        <p style="float:left; padding: 2px; border: solid 2px #17a2b8; padding-left: 5px; padding-right: 5px; border-radius: 5px;">' . $postTime . '</p>
                                        <span style="margin-left: 5px;">
                                            <a href="javascript:deleteParticularSchedule(' . $schedulepost->getId() . ', ' . $userId . ');" class="btn btn-outline-warning btn-sm" style=" border: none;"><i class="fa fa-trash-o" style="font-size:18px;"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="divider dotted mt-20"></div>
                            </li>';
                }
            }
        }
        $html .= '<div class="card card-statistics h-100">
                <div class="card-body text-center">
                    <div style="padding: 15px; text-align: center;">
                        <hr>
                        <h5 class="card-title">Bulk Schedule Details</h5>
                        <ul class="list-unstyled">' . $htmlLi . '</ul>
                    </div>
                </div>
            </div>';
        return $html;
    }

    public function getuserAction() {
        $userId = $_REQUEST['userId'];
        $html = $this->getUser($userId);
        echo $html;
    }

    public function indexAction() {
        
    }

}
