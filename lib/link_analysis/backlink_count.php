<?php

$domain = $_REQUEST['domain'];
$domainArr = parse_url($domain);
if (!empty($domainArr['host'])) {
    $domain = $domainArr['host'];
    $domain = ltrim($domain, "www.");
}


$result = 'Not Indexed @ Google.com';
$result_in_html = file_get_contents("http://www.google.com/search?q=link:{$domain}");
if (preg_match('/Results .*? of about (.*?) from/sim', $result_in_html, $regs)) {
    $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
    echo ucwords($domain) . ' Has <u>' . $indexed_pages . '</u> backlinks.';
} elseif (preg_match('/About (.*?) results/sim', $result_in_html, $regs)) {
    $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
    $result = $indexed_pages;
}

echo $result;
