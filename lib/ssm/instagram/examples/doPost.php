<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('/var/www/html/app/Mage.php');

require __DIR__ . '/../vendor/autoload.php';

Mage::app();
Mage::getSingleton("core/session", array("name" => "frontend"));
$session = Mage::getSingleton("customer/session");
date_default_timezone_set('UTC');
$url = Mage::getBaseUrl() . 'smm-post-instagram';

$arrVideoTypes = array("avi", "mp4");
$arrImage = array("jpeg", "jpg", "png", "gif");

$helper = Mage::helper('websiteaudit/data');

$locationLatLong = $_REQUEST['locationLatLong'];
$locationLatLongArr = explode(",", $locationLatLong);

$latitide = '';
$longitude = '';

if (!empty($locationLatLongArr)) {
    $latitide = $locationLatLongArr[0];
    $longitude = $locationLatLongArr[1];
}

$commentText = $_REQUEST['commentText'];

$sliderPollTopic = $_REQUEST['sliderPollTopic'];

$abPollTopic = $_REQUEST['abtopic'];
$abPollYes = $_REQUEST['abyes'];
$abPollNo = $_REQUEST['abno'];

$questionPoll = $_REQUEST['questionPoll'];

$countdown = $_REQUEST['countdowndate'];
$countdowntopic = $_REQUEST['countdowntopics'];

$captionText = $_REQUEST['captiontxt'];
$section = $_REQUEST['section'];
$userId = $_REQUEST['userid'];

$link = $_REQUEST['link'];
$msg = "";

$media_path = array();
$fileArr = array();

$customerId = "";

$scheduledate = $_REQUEST['scheduledate'];
$scheduletime = $_REQUEST['scheduletime'];

$scheduledateArr = explode("-", $_REQUEST['scheduledate']);
$scheduletimeArr = explode(":", $_REQUEST['scheduletime']);

$postFrom = (isset($_REQUEST['post_from']) ? $_REQUEST['post_from'] : '');
(isset($_REQUEST['post_from']) ? $_REQUEST['post_from'] : 'Normal Post');

//----------------- File Manager Starts -------------------
$fileManagerFileIds = $_REQUEST['fileManagerFileIds'];
//----------------- File Manager Ends ---------------------

$media = "";
$mediaId = 0;
if (isset($_REQUEST['media'])) {
    $schedulepostModel = Mage::getModel('schedulepost/schedulepost')->load($_REQUEST['media']);
    $mediaId = $_REQUEST['media'];
    $media = $schedulepostModel->getMediaPath();

    $sliderPollTopic = $schedulepostModel->getSliderPollTopic();

    $abPollTopic = $schedulepostModel->getYesNoPollTopic();
    $abPollYes = $schedulepostModel->getYesnoTopicYes();
    $abPollNo = $schedulepostModel->getYesnoTopicNo();

    $questionPoll = $schedulepostModel->getQuestionTopic();

    $countdown = $schedulepostModel->getCountdownStartingDate();
    $countdowntopic = $schedulepostModel->getCountdownText();
}
//"/var/www/html/media/media_library/0/1/9088941651.jpg"; //(isset($_REQUEST['media']) ? $_REQUEST['media'] : '');(isset($_REQUEST['media']) ? $_REQUEST['media'] : '');

$result = array();

//if ($session->isLoggedIn() || $postFrom == "CRON") {
//$customerData = $session->getCustomer();
$customerId = '1'; //$customerData->getId();

$modelUser = Mage::getModel('influencerusers/influencerusers')->load($userId);



$username = $modelUser->getUsername();
$password = $modelUser->getPassword();
//$debug = true;
$debug = false;
$truncatedDebug = false;
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: ' . $e->getMessage() . "\n";
    exit(0);
}

$profilePicUrl = $ig->account->getCurrentUser()->getUser()->getProfilePicUrl();

$location = '';
if (!empty($locationLatLongArr) && count($locationLatLongArr) == 2) {
    try {
        $location = $ig->location->search($locationLatLongArr[0], $locationLatLongArr[1])->getVenues()[0];
    } catch (\Exception $e) {
        echo 'Something went wrong: ' . $e->getMessage() . "\n";
    }
}

if ($section == 'simple_post') {
    if (isset($_FILES['localfile']['name']) && strlen($_FILES['localfile']['name']) >= 5) {
        $image = $_FILES['localfile']['name'];
        $category = "7" . DS . $customerId;

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

        $file = '/var/www/html/media/media_library/' . $category . '/' . $filename;

        array_push($media_path, $file);
    } elseif ($fileManagerFileIds > 0) {
        $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileIds);
        $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();
    } else {
        $file = $media;
    }


    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $arrImages = array("jpg", "png");
    $arrVideos = array("mp4", "avi");

    //----------- Need to Remove Starts -------------

    $metadata = [
        // (optional) Captions can always be used, like this:
        'caption' => $captionText, //'Test', //'#test This is a great API!', //$captionText,
        // (optional) To add a hashtag, do this:
        'hashtags' => [
            // Note that you can add more than one hashtag in this array.
            [
                'tag_name' => 'wallpaper.directory', // Hashtag WITHOUT the '#'! NOTE: This hashtag MUST appear in the caption.
                'x' => 0.7, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                'y' => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                'width' => 0.24305555, // Clickable area size, as percentage of image size: 0.0 - 1.0
                'height' => 0.07347973, // ...
                'rotation' => 0.6,
                'is_sticker' => false, // Don't change this value.
                'use_custom_title' => false, // Don't change this value.
            ],
        // ...
        ],
        // (optional) To add a location, do BOTH of these:
        'location_sticker' => [
            'width' => 0.89333333333333331,
            'height' => 0.071281859070464776,
            'x' => 0.5,
            'y' => 0.2,
            'rotation' => 0.0,
            'is_sticker' => true,
            'location_id' => (!empty($locationLatLongArr) && count($locationLatLongArr) == 2 ? $location->getExternalId() : ''), //(isset($location) ? $location->getExternalId() : ''),
        ],
        'location' => $location,
            // (optional) You can use story links ONLY if you have a business account with >= 10k followers.
            // 'link' => 'https://github.com/mgp25/Instagram-API',
    ];

    //----------- Need to Remove Ends -------------
    if (in_array(strtolower($ext), $arrImages)) {
        try {
            $photoFilename = $file;
            $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
            $result = $ig->timeline->uploadPhoto($photo->getFile(), $metadata);
            $result = json_decode($result, true);
            if (strlen($commentText) >= 1 && !empty($result['media']['caption']['media_id'])) {
                $ig->media->comment($result['media']['caption']['media_id'], $commentText);
            }
        } catch (\Exception $e) {
            echo 'Something went wrong: ' . $e->getMessage() . "\n";
        }
    } elseif (in_array(strtolower($ext), $arrVideos)) {
        try {
            $videoFilename = $file;
            $video = new \InstagramAPI\Media\Video\InstagramVideo($videoFilename);
            //$result = $ig->timeline->uploadVideo($video->getFile(), ['caption' => $captionText]);
            $result = $ig->timeline->uploadVideo($video->getFile(), $metadata);
            if (strlen($commentText) >= 1 && !empty($result['media']['caption']['media_id'])) {
                $ig->media->comment($result['media']['caption']['media_id'], $commentText);
            }
            $result = json_decode($result, true);
        } catch (Exception $ex) {
            echo 'Something went wrong: ' . $ex->getMessage() . "\n";
        }
    } else {
        echo "Unknown Extension: " . strtolower($ext);
    }
} elseif ($section == 'story') {
    if (!empty($_FILES['localfile']['name']) && count(explode(",", $fileManagerFileIds)) == 0) {

        for ($i = 0; $i < count($_FILES['localfile']['name']); $i++) {
            $image = $_FILES['localfile']['name'][$i];
            $category = "7" . DS . $customerId;

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
    } elseif ($fileManagerFileIds != '' || count(explode(",", $fileManagerFileIds)) >= 1) {
        $fileManagerFileIdsArr = explode(",", $fileManagerFileIds);
        foreach ($fileManagerFileIdsArr as $fileManagerFileId) {
            $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileId);
            $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();

            array_push($fileArr, $file);
            array_push($media_path, $file);
        }
    }

    $mediaCount = 0;
    if (strlen($media) >= 4) {
        $fileArr = explode(",", $media);
    }
    if (strlen($sliderPollTopic) >= 1) {
        $sliderPollTopic = explode(",", $sliderPollTopic);
    }

    if (strlen($abPollTopic) >= 1) {
        $abPollTopic = explode(",", $abPollTopic);
    }
    if (strlen($abPollYes) >= 1) {
        $abPollYes = explode(",", $abPollYes);
    }
    if (strlen($abPollNo) >= 1) {
        $abPollNo = explode(",", $abPollNo);
    }

    if (strlen($questionPoll) >= 1) {
        $questionPoll = explode(",", $questionPoll);
    }
    if (strlen($countdown) >= 1) {
        $countdown = explode(",", $countdown);
    }
    if (strlen($countdowntopic) >= 1) {
        $countdowntopic = explode(",", $countdowntopic);
    }

    if (count($fileArr) >= 1) {
        $storyFileCount = 0;
        /* foreach ($sliderPollTopic as $sliderPoll) {
          if (strlen($sliderPollTopic[$storyFileCount]) >= 3) {

          } else {

          }
          $storyFileCount++;
          } */
        $fileCount = 0;
        foreach ($fileArr as $fileCustom) {
            //------------------- Slider Poll Starts -------------------
            if (strlen($sliderPollTopic[$fileCount]) >= 3) {
                $metadata = [
                    'story_sliders' => [
                        // Note that you can only do one story poll in this array.
                        [
                            'question' => $sliderPollTopic[$fileCount], //'Is this API great?', // Story poll question. You need to manually to draw it on top of your image.
                            'viewer_vote' => 0, // Don't change this value.
                            'viewer_can_vote' => false, // Don't change this value.
                            'slider_vote_count' => 0, // Don't change this value.
                            'slider_vote_average' => 0, // Don't change this value.
                            'background_color' => '#ffffff',
                            'text_color' => '#000000',
                            'emoji' => '😍',
                            'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                            'y' => 0.8, // Also note that X/Y is setting the position of the CENTER of the clickable area
                            'width' => 0.7777778, // Clickable area size, as percentage of image size: 0.0 - 1.0
                            'height' => 0.22212838, // ...
                            'rotation' => 0.0,
                            'is_sticker' => true, // Don't change this value.
                        ],
                    ],
                ];
            } elseif (strlen($countdown[$fileCount]) >= 3 && strlen($countdowntopic[$fileCount]) >= 3) {
                $today = date("d-m-Y");
                $userDate = str_replace("/", "-", $countdown[$fileCount]);
                $diff = strtotime($userDate) - strtotime($today);
                $noOfDay = abs(round($diff / 86400));


                $metadata = [
                    'story_countdowns' => [
                        [
                            'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                            'y' => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                            'z' => 0, // Don't change this value.
                            'width' => 0.6564815, // Clickable area size, as percentage of image size: 0.0 - 1.0
                            'height' => 0.22630993, // ...
                            'rotation' => 0.0,
                            'text' => $countdowntopic[$fileCount], // Name of the countdown. Make sure it's in all caps!
                            'text_color' => '#ffffff',
                            'start_background_color' => '#ca2ee1',
                            'end_background_color' => '#5eb1ff',
                            'digit_color' => '#7e0091',
                            'digit_card_color' => '#ffffff',
                            'end_ts' => time() + strtotime($noOfDay . ' day', 0), // UNIX Epoch of when the countdown expires.
                            'following_enabled' => true, // If true, viewers can subscribe to a notification when the countdown expires.
                            'is_sticker' => true, // Don't change this value.
                        ],
                    ],
                ];
            } elseif (strlen($questionPoll[$fileCount]) >= 3) {
                $metadata = [
                    'story_questions' => [
                        // Note that you can only do one story question in this array.
                        [
                            'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                            'y' => 0.5004223, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                            'z' => 0, // Don't change this value.
                            'width' => 0.63118356, // Clickable area size, as percentage of image size: 0.0 - 1.0
                            'height' => 0.22212838, // ...
                            'rotation' => 0.0,
                            'viewer_can_interact' => false, // Don't change this value.
                            'background_color' => '#ffffff',
                            'profile_pic_url' => $profilePicUrl, // Must be the profile pic url of the account you are posting from!
                            'question_type' => 'text', // Don't change this value.
                            'question' => $questionPoll[$fileCount], // Story question.
                            'text_color' => '#000000',
                            'is_sticker' => true, // Don't change this value.
                        ],
                    ],
                ];
            } elseif (!empty($abPollTopic[$fileCount])) {
                $aByBPoll = $abPollTopic[$fileCount];
                $ans1 = $abPollYes[$fileCount];
                $ans2 = $abPollNo[$fileCount];

                $metadata = [
                    'story_polls' => [
                        // Note that you can only do one story poll in this array.
                        [
                            'question' => 'Test Question - 1', //$abPollTopic[$fileCount], // Story poll question. You need to manually to draw it on top of your image.
                            'viewer_vote' => 0, // Don't change this value.
                            'viewer_can_vote' => true, // Don't change this value.
                            'tallies' => [
                                [
                                    'text' => $ans1, // Answer 1.
                                    'count' => 0, // Don't change this value.
                                    'font_size' => 35.0, // Range: 17.5 - 35.0.
                                ],
                                [
                                    'text' => $ans2, // Answer 2.
                                    'count' => 0, // Don't change this value.
                                    'font_size' => 27.5, // Range: 17.5 - 35.0.
                                ],
                            ],
                            'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                            'y' => 0.1, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                            'width' => 0.5661107, // Clickable area size, as percentage of image size: 0.0 - 1.0
                            'height' => 0.10647108, // ...
                            'rotation' => 0.0,
                            'is_sticker' => true, // Don't change this value.
                        ],
                    ],
                ];
            } elseif (strlen($link) >= 3) {
                $metadata = [
                    // (optional) Captions can always be used, like this:
                    'caption' => '#test This is a great API!',
                    // (optional) To add a hashtag, do this:
                    'hashtags' => [
                        // Note that you can add more than one hashtag in this array.
                        [
                            'tag_name' => 'test', // Hashtag WITHOUT the '#'! NOTE: This hashtag MUST appear in the caption.
                            'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                            'y' => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                            'width' => 0.24305555, // Clickable area size, as percentage of image size: 0.0 - 1.0
                            'height' => 0.07347973, // ...
                            'rotation' => 0.0,
                            'is_sticker' => false, // Don't change this value.
                            'use_custom_title' => false, // Don't change this value.
                        ],
                    // ...
                    ],
                    // (optional) To add a location, do BOTH of these:
                    'location_sticker' => [
                        'width' => 0.89333333333333331,
                        'height' => 0.071281859070464776,
                        'x' => 0.5,
                        'y' => 0.2,
                        'rotation' => 0.0,
                        'is_sticker' => true,
                        'location_id' => (!empty($locationLatLongArr) && count($locationLatLongArr) == 2 ? $location->getExternalId() : ''),
                    ],
                    'location' => $location,
                    // (optional) You can use story links ONLY if you have a business account with >= 10k followers.
                    'link' => $link[$fileCount],
                ];
                /* $metadata = [
                  // (optional) You can use story links ONLY if you have a business account with >= 10k followers.
                  'link' => $link[$fileCount],
                  ]; */
            } else {
                $metadata = [];
            }
            //------------------ AB Poll Ends ---------------------------


            try {
                $photoFilename = $fileCustom;
                $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename, ['targetFeed' => \InstagramAPI\Constants::FEED_STORY]);
                $result = $ig->story->uploadPhoto($photo->getFile(), $metadata);
                /* if (strlen($commentText) >= 1 && !empty($result['media']['caption']['media_id'])) {
                  $ig->media->comment($result['media']['caption']['media_id'], $commentText);
                  } */
                $result = json_decode($result, true);
            } catch (Exception $ex) {
                echo 'Something went wrong: ' . $ex->getMessage() . "\n";
            }
            $fileCount++;
        }
    }
} elseif ($section == 'carrousal') {
    //--------------------------------------
    if (!empty($_FILES['localfile']['name']) && $fileManagerFileIds == '') {
        //die('123');
        $fileArr = array();
        for ($i = 0; $i < count($_FILES['localfile']['name']); $i++) {
            $image = $_FILES['localfile']['name'][$i];
            $category = "7" . DS . $customerId;

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
    } elseif ($fileManagerFileIds != '') {
        $fileManagerFileIdsArr = explode(",", $fileManagerFileIds);
        foreach ($fileManagerFileIdsArr as $fileManagerFileId) {
            $fileManager = Mage::getModel('filemanager/filemanager')->load($fileManagerFileId);
            $file = "/var/www/html/media/media_library/" . $fileManager->getFilename();

            array_push($fileArr, $file);
            array_push($media_path, $file);
        }
    }

    //$arrVideoTypes = array("avi", "mp4");
    //$arrImage = array("jpeg", "jpg", "png", "gif");
    $count = 0;
    $media = array();

    foreach ($fileArr as $fileForCarousal) {
        if ($count <= 9) {
            $fileType = "";
            $ext = pathinfo($fileForCarousal, PATHINFO_EXTENSION);
            if (in_array($ext, $arrImage)) {
                $fileType = "photo";
            } elseif (in_array($ext, $arrVideoTypes)) {
                $fileType = "video";
            }
            $tempArr = array("type" => $fileType, "file" => $fileForCarousal);
            $media[$count] = $tempArr;
        }
        $count++;
    }
    //--------------------------------------
    //$captionText = 'Taj Carousal'; // Caption to use for the album.
//////////////////////

    /* $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

      try {
      $ig->login($username, $password);
      } catch (\Exception $e) {
      echo 'Something went wrong: ' . $e->getMessage() . "\n";
      exit(0);
      } */

////// NORMALIZE MEDIA //////
// All album files must have the same aspect ratio.
// We copy the app's behavior by using the first file
// as template for all subsequent ones.
    $mediaOptions = [
        'targetFeed' => \InstagramAPI\Constants::FEED_TIMELINE_ALBUM,
            // Uncomment to expand media instead of cropping it.
            //'operation' => \InstagramAPI\Media\InstagramMedia::EXPAND,
    ];
    foreach ($media as &$item) {
        /** @var \InstagramAPI\Media\InstagramMedia|null $validMedia */
        $validMedia = null;
        switch ($item['type']) {
            case 'photo':
                $validMedia = new \InstagramAPI\Media\Photo\InstagramPhoto($item['file'], $mediaOptions);
                break;
            case 'video':
                $validMedia = new \InstagramAPI\Media\Video\InstagramVideo($item['file'], $mediaOptions);
                break;
            default:
            // Ignore unknown media type.
        }
        if ($validMedia === null) {
            continue;
        }

        try {
            $item['file'] = $validMedia->getFile();
            // We must prevent the InstagramMedia object from destructing too early,
            // because the media class auto-deletes the processed file during their
            // destructor's cleanup (so we wouldn't be able to upload those files).
            $item['__media'] = $validMedia; // Save object in an unused array key.
        } catch (\Exception $e) {
            continue;
        }
        if (!isset($mediaOptions['forceAspectRatio'])) {
            // Use the first media file's aspect ratio for all subsequent files.
            /** @var \InstagramAPI\Media\MediaDetails $mediaDetails */
            $mediaDetails = $validMedia instanceof \InstagramAPI\Media\Photo\InstagramPhoto ? new \InstagramAPI\Media\Photo\PhotoDetails($item['file']) : new \InstagramAPI\Media\Video\VideoDetails($item['file']);
            $mediaOptions['forceAspectRatio'] = $mediaDetails->getAspectRatio();
        }
    }
    unset($item);

    //-------------------------------------------------
    $metadata = [
        // (optional) Captions can always be used, like this:
        'caption' => $captionText, //'#test This is a great API!', //$captionText,
        // (optional) To add a hashtag, do this:
        'hashtags' => [
            // Note that you can add more than one hashtag in this array.
            [
                'tag_name' => 'test', // Hashtag WITHOUT the '#'! NOTE: This hashtag MUST appear in the caption.
                'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                'y' => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                'width' => 0.24305555, // Clickable area size, as percentage of image size: 0.0 - 1.0
                'height' => 0.07347973, // ...
                'rotation' => 0.0,
                'is_sticker' => false, // Don't change this value.
                'use_custom_title' => false, // Don't change this value.
            ],
        // ...
        ],
        // (optional) To add a location, do BOTH of these:
        'location_sticker' => [
            'width' => 0.89333333333333331,
            'height' => 0.071281859070464776,
            'x' => 0.5,
            'y' => 0.2,
            'rotation' => 0.0,
            'is_sticker' => true,
            'location_id' => (!empty($locationLatLongArr) && count($locationLatLongArr) == 2 ? $location->getExternalId() : ''), //(isset($location) ? $location->getExternalId() : ''),
        ],
        'location' => $location,
            // (optional) You can use story links ONLY if you have a business account with >= 10k followers.
            // 'link' => 'https://github.com/mgp25/Instagram-API',
    ];
    //-------------------------------------------------

    try {
        //$result = $ig->timeline->uploadAlbum($media, ['caption' => $captionText]);
        $result = $ig->timeline->uploadAlbum($media, $metadata);
        if (strlen($commentText) >= 1 && !empty($result['media']['caption']['media_id'])) {
            $ig->media->comment($result['media']['caption']['media_id'], $commentText);
        }
        $result = json_decode($result, true);
    } catch (\Exception $e) {
        echo 'Something went wrong: ' . $e->getMessage() . "\n";
    }
}
/* } else {
  $msg = "Login Expire";
  } */

//------------------- Schedule Work Start ---------------------

$media = rtrim(ltrim(implode(",", $media_path), ","), ",");
$abPollTopic = rtrim(ltrim(implode(",", $abPollTopic), ","), ",");
$abPollYes = rtrim(ltrim(implode(",", $abPollYes), ","), ",");
$abPollNo = rtrim(ltrim(implode(",", $abPollNo), ","), ",");
$sliderPollTopic = rtrim(ltrim(implode(",", $sliderPollTopic), ","), ",");

if (isset($_REQUEST['media'])) {
    $model = Mage::getModel('schedulepost/schedulepost')->load($_REQUEST['media']);
    $media = ($model->getMediaPath() != '' ? $model->getMediaPath() : $media);
    $captionText = ($model->getCaption() != '' ? $model->getCaption() : $captionText);
    $latitide = ($model->getLatitide() != '' ? $model->getLatitide() : $latitide);
    $longitude = ($model->getLongitude() != '' ? $model->getLongitude() : $longitude);
    $commentText = ($model->getComment() != '' ? $model->getComment() : $commentText);
    $day = ($model->getScheduledPostDay() != '' ? $model->getScheduledPostDay() : $day);
    $month = ($model->getScheduledPostMonth() != '' ? $model->getScheduledPostMonth() : $month);
    $year = ($model->getScheduledPostYear() != '' ? $model->getScheduledPostYear() : $year);
    $hour = ($model->getScheduledPostHours() != '' ? $model->getScheduledPostHours() : $hour);
    $minutes = ($model->getScheduledPostMinutes() != '' ? $model->getScheduledPostMinutes() : $minutes);
} else {
    $model = Mage::getModel('schedulepost/schedulepost');
    $year = '2019'; //$scheduledateArr[0];
    $month = number_format($scheduledateArr[1]);
    $day = number_format($scheduledateArr[2]);
    $hour = number_format($scheduletimeArr[0]);
    $minutes = number_format($scheduletimeArr[1]);
}



$postStatus = 0;

if (!empty($result['media']['code'])) {
    $postURL = $result['media']['code'];
    $postStatus = 1;
}


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
$model->setPostStatus($postStatus);
$model->setStatus('1');
$model->setPostFrom($postFrom);
$model->setResponse($postURL);
$model->setCreatedTime(now());
$model->setUpdateTime(now());
try {
    $model->save();
} catch (Exception $ex) {
    $msg = $ex->getMessage();
}


//------------------- Schedule Work Ends ----------------------

echo json_encode(array('status' => $result['status'], 'post_url' => $postURL));

