<?php

//ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(0);

require __DIR__ . '/../vendor/autoload.php';

$username = "masterajib";
$password = "9804915618";
//$debug = true;
$debug = false;
$truncatedDebug = false;
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    //echo 'Something went wrong: ' . $e->getMessage() . "\n";
    //exit(0);
}

$place = $_REQUEST['place'];

try {
    //$location = $ig->location->search('22.5726', '88.3639')->getVenues()[0];
    $location = $ig->location->findPlaces($place);
} catch (\Exception $e) {
    //echo 'Something went wrong: ' . $e->getMessage() . "\n";
}

$html = '<ul class="locationList" id="locationList" style="display: block;height: 200px; overflow: auto;border-bottom: 1px solid rgb(204, 204, 204);">';
$count = 1;
$locationArr = json_decode($location, true);
if (empty(!$locationArr)) {
    foreach ($locationArr['items'] as $locatinData) {
        //echo "<pre>"; print_r($locatinData); die();
        $locationName = $locatinData['title'];//$locatinData['location']['name'];
        $subTitle = $locatinData['subtitle'];
        
        $image = $locatinData['header_media']['media'][0]['image_versions2']['candidates'][0]['url'];
        
        
        $locationAddress = $locatinData['location']['address'];
        $locationCity = $locatinData['location']['city'];
        $locationShortName = $locatinData['location']['short_name'];
        $locationLng = $locatinData['location']['lng'];
        $locationLat = $locatinData['location']['lat'];
        $locationFacebookPlacesId = $locatinData['location']['facebook_places_id'];
        $locationLng = $locatinData['location']['lng'];

        $html .= '<li class="locationListOptions" id="locationListOptions'.$count.'">
                    <div class="custom-control custom-radio">
                        <a href="javascript:setLocation('.$count.');">
                            <img style="border: solid #ccc 1px; padding: 1px; width:40px; height:40px; margin-top:-20px;" class="img-fluid mr-15 avatar-small" src="'.$image.'" alt="">
                        </a>
                        <input style="display:none;" type="radio" id="customRadio' . $count . '" name="locationRadio[]" class="custom-control-input" value="' . $locationLat . ',' . $locationLng . '">
                        <label id="customRadioLbl' . $count . '" onclick="javascript:setLocation('.$count.');" class="" for="customRadio' . $count . '">' . $locationName . '</lable><br><small>'.(strlen($subTitle) >= 3 ? $subTitle : $locationName).'</small>
                    </div>
                </li>';

        $count++;
    }
} else {
    
}
$html .= "</ul>";
//echo json_encode(array("html"=>$html));

//echo json_encode(array("html" => $html));
echo $html;
