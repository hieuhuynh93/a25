<?php

require 'simple_dom.php';
require 'all_functions.php';

$arrOutput = array();

$urlCustom = $_REQUEST['domain'];

    $my_url = raino_trim($urlCustom);
    if (substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
        $my_url = 'http://' . $my_url;
        $regUserInput = $my_url;
        $uriData = doLinkAnalysis($my_url);
        $internal_links = $uriData[0];
        $internal_links_count = $uriData[1];
        $internal_links_nofollow = $uriData[2];
        $external_links = $uriData[3];
        $external_links_count = $uriData[4];
        $external_links_nofollow = $uriData[5];
        $total_links = $uriData[6];
        $total_nofollow_links = (int) $internal_links_nofollow + (int) $external_links_nofollow;
        
        //echo "<pre>"; print_r($internal_links);
        $arrOutput['internal'] = $internal_links;
        $arrOutput['external'] = $external_links;
        //echo "<pre>"; print_r($internal_links_count);
        //echo "<pre>"; print_r($internal_links_nofollow);
        
        //echo "<pre>"; print_r($external_links);
        //echo "<pre>"; print_r($external_links_count);
        //echo "<pre>"; print_r($external_links_nofollow);
        
        //echo "<pre>"; print_r($total_links);
        //echo "<pre>"; print_r($total_nofollow_links);
    //}
//}
        
        echo json_encode($arrOutput);