<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = 'https://www.instagram.com/instagram/';

$source = file_get_contents($url);

preg_match('/<script type="text\/javascript">window\._sharedData =([^;]+);<\/script>/', $source, $matches);

if (!isset($matches[1]))
    return false;

$r = json_decode($matches[1], true);

echo "<pre>";
print_r($r);
?>