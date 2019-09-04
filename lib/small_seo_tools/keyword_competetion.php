<?php
error_reporting(0);
set_time_limit(0);

include("functions.php");

$google_custom_search_api_keys = array(
    'AIzaSyBIVC1zsTWSQHAztUmKIxV8_I5lmz7Xwqg',
    'AIzaSyCG5YbGO9-RNzYyQW4_baNog6Fum8VFGLs',
    'AIzaSyD07bMR_gfLquI9JmU9i3NxZsxEzDPFTKM',
    'AIzaSyCPzQ9HY-uuk5s1oxOALs_oTpLfuMv7PQg',
    'AIzaSyDD16i1kTpT7PDUcYryL4VXCPjDLLJOVfA',
    'AIzaSyCjl8j0aeydf3kDahVQM4osUh2Yyhug9v8',
    'AIzaSyDnYCZmd0bbiCSkCZVi78RXJJrphOa2Cmc',
    'AIzaSyBcbJUl1XHe9TZo3AfKrlhsLePolp2veGg',
    'AIzaSyC6Hmufrq2VPcwXp9PzbKoH56Lr6iLPA8o',
    'AIzaSyDSfGLB_iMmDlLF08ELUrz9-28iQXdpVJM',
    'AIzaSyDxNlWYBO9RI9GSqE4i65WDgNabyeCSPoA',
    'AIzaSyDF-xD2A6GyTrg1KMo59rPZG5dHQu6zHsc',
    'AIzaSyC__aCAQAiMrFtv6om9tacGnulruT9VuJ4',
    'AIzaSyBv9bg7lPzsVoM3hmXggZ3KO_lQUwZpAW0',
    'AIzaSyAT9RoXETWzAW_nIVuEtYR0waUTbIFd7Hc',
    'AIzaSyB2AbQQPY9xLkhI2aYrr3fd5-xR7PCXG4Y',
    'AIzaSyBfb-7zxiI1nC9N66Xa-H8NPni6i71ID40',
    'AIzaSyC9Cv3rkO7qpiCku0_TOG9waLgNiZDOPxs',
    'AIzaSyCTS15pClV0MV8Muk822izAGdCwLtaGihA',
    'AIzaSyBVWqZ-sDjGZVX1NXkMHgJt0DHaElQVO4o',
);
$google_custom_search_engine_id = '002015648471418999806:knz9jdyea4m';

$download = "";
$download = $_POST['download'];
if ($download != "") {
    $darray = unserialize(base64_decode($download));
    header('Content-type: application/vnd.ms-excel');
    header('Content-disposition: attachment; filename="results.xls"');
    foreach ($darray as $value) {
        echo $value;
    }
    exit();
}

    $keywords = trim(strip_tags(strtolower($_REQUEST['url'])));
    $keywords = str_replace(array("\n\r", "\r\n", "\n", "\r"), '<br />', $keywords);
    $keywords_array = explode("<br />", $keywords);
    $keywords_array = array_filter($keywords_array);

    $final = array();
    $count = 1;
    if (!empty($keywords_array)) {
        ?>
        <?php if(!isset($_REQUEST['hdr'])): ?>
            <table class="table table-striped table-bordered p-0" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>  	
                <th align="center">Keyword</th><th align="center">Broad</th><th align="center">Exact</th><th align="center">AllInTitle</th><th align="center">AllInURL</th><th align="center">AllInAnchor</th><th align="center">AllInText</th>
            </tr>
        <?php endif;?>
        
            <?php
            $csvData[] = "Keyword" . "\t" . "Broad" . "\t" . "Exact" . "\t" . "AllInTitle" . "\t" . "AllInURL" . "\t" . "AllInAnchor" . "\t" . "AllInText" . "\n";
            foreach ($keywords_array as $keyword) {
                $keyword = trim($keyword);
                $broad_keyword = urlencode(trim($keyword));
                $exact_keyword = urlencode(trim('"' . trim($keyword) . '"'));
                $allintitle_keyword = urlencode(trim("allintitle:" . trim($keyword)));
                $allinurl_keyword = urlencode(trim("allinurl:" . trim($keyword)));
                $allinanchor_keyword = urlencode(trim("allinanchor:" . trim($keyword)));
                $allintext_keyword = urlencode(trim("allintext:" . trim($keyword)));

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $broad_keyword);

                $data = json_decode($content, true);

                $broad_total = $data['queries']['request'][0]['totalResults'];

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $exact_keyword);

                $data = json_decode($content, true);

                $exact_total = $data['queries']['request'][0]['totalResults'];

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $allintitle_keyword);

                $data = json_decode($content, true);

                $allintitle_total = $data['queries']['request'][0]['totalResults'];

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $allinurl_keyword);

                $data = json_decode($content, true);

                $allinurl_total = $data['queries']['request'][0]['totalResults'];

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $allinanchor_keyword);

                $data = json_decode($content, true);

                $allinanchor_total = $data['queries']['request'][0]['totalResults'];

                $random_key = array_rand($google_custom_search_api_keys);
                $google_custom_search_api_key = $google_custom_search_api_keys[$random_key];

                $content = file_get_contents_curl("https://www.googleapis.com/customsearch/v1?gl=de&key=" . $google_custom_search_api_key . "&cx=" . $google_custom_search_engine_id . "&q=" . $allintext_keyword);

                $data = json_decode($content, true);

                $allintext_total = $data['queries']['request'][0]['totalResults'];
                ?>	
             <?php if(!isset($_REQUEST['hdr'])): ?>
            <tr>
            <?php endif; ?>
                  	
                    <td align="left"><?php echo $keyword; ?></td><td align="center"><?php echo number_format($broad_total); ?></td><td align="center"><?php echo number_format($exact_total); ?></td><td align="center"><?php echo number_format($allintitle_total); ?></td><td align="center"><?php echo number_format($allinurl_total); ?></td><td align="center"><?php echo number_format($allinanchor_total); ?></td><td align="center"><?php echo number_format($allintext_total); ?></td>
                
                <?php if(!isset($_REQUEST['hdr'])): ?>
            </tr>
            <?php endif; ?>
                		
            <?php
            $csvData[] = "$keyword" . "\t" . "$broad_total" . "\t" . "$exact_total" . "\t" . "$allintitle_total" . "\t" . "$allinurl_total" . "\t" . "$allinanchor_total" . "\t" . "$allintext_total" . "\n";
            $count++;
        }
        ?>	
                <?php if(!isset($_REQUEST['hdr'])): ?>
                    </table>
                <?php endif; ?>
        
            <?php
            //echo '<form action="ajax.php" method="POST"><input name="download" type="hidden" value="' . base64_encode(serialize($csvData)) . '" size="30"><input class="w-btn" type="submit" value="Export to Excel"></form>';
        } else {
            echo '<h3>Please enter keywords!</h3>';
        }
    
    ?>