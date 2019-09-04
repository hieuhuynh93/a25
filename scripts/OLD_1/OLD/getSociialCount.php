<?php

$url = "https://www.indiatimes.com/videocafe/";

function get_meta($url) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_USERAGENT, 'Linux / Firefox 29: Mozilla/5.0 (X11; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
    $metaArr = array();
    $contents = curl_exec($c);
    if (isset($contents) && is_string($contents)) {
        $title = null;
        $metaTags = null;

        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);

        if (isset($match) && is_array($match) && count($match) > 0) {
            $title = strip_tags($match[1]);
        }

        preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

        if (isset($match) && is_array($match) && count($match) == 3) {
            $originals = $match[0];
            $names = $match[1];
            $values = $match[2];

            if (count($originals) == count($names) && count($names) == count($values)) {
                $metaTags = array();

                for ($i = 0, $limiti = count($names); $i < $limiti; $i++) {
                    $metaTags[$names[$i]] = array(
                        'html' => htmlentities($originals[$i]),
                        'value' => $values[$i]
                    );
                }
            }
        }

        $result = array(
            'title' => $title,
            /*'metaTags' => $metaTags*/
            'author' => $metaTags['author']['value'],
            'keywords' => $metaTags['keywords']['value'],
            'description' => $metaTags['description']['value'],
            'viewport' => $metaTags['viewport']['value']
        );
    }
    return $result;
}

//Example:
$meta = get_meta($url);

echo "<pre>"; print_r($meta);
//echo "<pre>"; print_r($meta['metaTags']);
?>
