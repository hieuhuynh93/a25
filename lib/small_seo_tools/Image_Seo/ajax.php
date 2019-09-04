<?php

error_reporting(0);
set_time_limit(0);

function get_domain_name($url) {
    $domain = parse_url($url);
    return $domain['host'];
}

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}



    $url = trim($_REQUEST["url"]);


    if (substr($url, 0, 4) != "http") {

        echo "<br /><br /><br /><br /><center><h3>Please Enter Full Web Page URL Including http://</h3></center>";
        exit();
    }

    $domain = get_domain_name($url);
    $domain = str_replace("www.", "", $domain);

    $parsedurl = parse_url($url);
    $target_domain = $parsedurl['scheme'] . '://' . $parsedurl['host'] . '/';

    $content = file_get_contents_curl($url);


    preg_match_all('#<img(.*?)(>|/>)#is', $content, $img_links);
    $img_html = '<div class="row">';
    
    foreach ($img_links[0] as $img_link) {

        $img_html .= '<div class="col-md-3 mb-10">
                            <div class="card" style="height:250px;overflow: auto;">
                                <div class="card-body">';
                                
        preg_match('#src=("|\')(.*?)("|\')#is', $img_link, $src);

        $src = $src[2];

        if (substr($src, 0, 4) != "http" && substr($src, 0, 2) != "//")
            $src = $target_domain . ltrim($src, "/");

        $src_array = explode("/", $src);
        $src_array = array_reverse($src_array);
        $img_name = $src_array[0];

        $img_html .= '<h5>Image name: ' . $img_name . '</h5>';
        $img_html .= '<div class="image"><img src="' . $src . '" / style="max-width: 100%; max-height: 100px"></div>';
        $img_html .= '<div class="notes" style="line-height:normal;"><p>';

        preg_match('#alt=("|\')(.*?)("|\')#is', $img_link, $img_check);

        $alt_text = $img_check[2];
        $alt_words = str_word_count($alt_text);

        if ($img_check[2]) {

            $img_html .= '<i class="fa fa-check-circle-o"></i><strong> Above image has ' . $alt_words . ' words in the alt text.</strong> </p>';

            if ($alt_words == "1")
                $img_html .= '<i class="fa fa-info-circle"></i> The ALT text of this image is following the Google guidelines at their minimum, but could likely be more descriptive. See if the alt text adequately describes the image.';
            elseif ($alt_words < "6")
                $img_html .= '<i class="fa fa-info-circle"></i> The ALT text of this image appears to be following the Google guidelines well!';
            else
                $img_html .= '<i class="fa fa-info-circle"></i> The ALT text of this image appears to be following the Google guidelines well, but you may want to review the text and make sure the ALT text is describing the image, not just repeating words.';
        }else {

            $img_html .= '<i class="fa fa-times-circle-o"></i><strong> Above image has no alt text!</strong> </p>';
            $img_html .= '<i class="fa fa-exclamation-circle"></i> This image is not following part of the Google guidelines. Add alt text.';
        }

        preg_match('#height=("|\')(.*?)("|\')#is', $img_link, $height);
        $height = $height[2];

        preg_match('#width=("|\')(.*?)("|\')#is', $img_link, $width);
        $width = $width[2];

        if ($height == "" && $width == "")
            $img_html .= '<div><i class="fa fa-exclamation-circle"></i>Above image has no dimensions (height/width)!</div>';
        else
            $img_html .= '<div><i class="fa fa-check-circle-o"></i>Above image has dimensions (height/width)</div>';
        $img_html .= '<div class="alt" style="line-height:normal;">';
        if ($alt_text != "")
            $img_html .= '<p></p><div><span>Alt Text: ' . $alt_text . '</span></div><p></p>';
        if ($width != "")
            $img_html .= '<div><span>Width: ' . $width . '</span></div>';
        if ($height != "")
            $img_html .= '<div><span>Height: ' . $height . '</span></div>';
        $img_html .= '<br></div></div></div>';
        $img_html .= '</div></div>';
    }
    $img_html .= '</div>';
    echo $img_html;

?>
