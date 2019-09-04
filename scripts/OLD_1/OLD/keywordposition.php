<?php

@ini_set('max_execution_time', 180000000);

function search_rank_api($key, $eng, $searchUrl) {
    $parseURL = parse_url($searchUrl);
    $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';

    $result = '';
    $isRank = 0;

    $engine = array('google' => 'https://www.google.co.in/search?q=', 'yahoo' => 'https://in.search.yahoo.com/search?p=', 'bing' => 'https://www.bing.com/search?q=');
    $str = str_replace(" ", "+", $key);
    $url = $engine[$eng] . $str . "&num=100";

    $body = @file_get_contents($url);

    $domdoc = new DOMDocument();
    @$domdoc->loadHTML($body);
    $xml = new DOMXpath($domdoc);
    if ($eng == 'google') {
        $res = $xml->query('//h3[@class="r"]//a');
    } elseif ($eng == 'yahoo') {
        $res = $xml->query('//h3[@class="title"]//a');
    } elseif ($eng == 'bing') {
        $res = $xml->query('//h2//a');
    }
    $html = "";
    if ($res) {
        foreach ($res as $k => $link) {
            $html[] = $link->getAttribute('href');
        }
    } else {
        $html = 0;
    }
    $psition = 1;
    foreach ($html as $res) {
        if ($eng == 'google') {
            $parseURL = parse_url(explode("=", $res)[1]);
            $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
            if ($domain == $domainNew) {
                $result = $psition;
                $isRank = 1;
                break;
            }
            $psition++;
        } elseif ($eng == 'yahoo') {
            $parseURL = parse_url($res);
            $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
            if ($domain == $domainNew) {
                $result = $psition;
                $isRank = 1;
                break;
            }
            $psition++;
        } elseif ($eng == 'bing') {
            $parseURL = parse_url($res);
            $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
            if ($domain == $domainNew) {
                $result = $psition;
                $isRank = 1;
                break;
            }
            $psition++;
        }
    }
    return ($result > 0 ? $result : 0);
}

$searchUrl = 'https://www.indiatimes.com/';
$parseURL = parse_url($searchUrl);
$domain = $parseURL['host'];
$host_names = explode(".", $domain);
$domain = $host_names[count($host_names) - 2] . "." . $host_names[count($host_names) - 1];

echo search_rank_api('news', 'google', $domain);
echo search_rank_api('video', 'yahoo', $domain);
echo search_rank_api('video', 'bing', $domain);
