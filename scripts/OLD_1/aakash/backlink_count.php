<?php

    $domain = 'indiatimes.com';

    $result_in_html = file_get_contents("http://www.google.com/search?q=link:{$domain}");
    if (preg_match('/Results .*? of about (.*?) from/sim', $result_in_html, $regs)) {
        $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
        echo ucwords($domain) . ' Has <u>' . $indexed_pages . '</u> backlinks.';
    } elseif (preg_match('/About (.*?) results/sim', $result_in_html, $regs)) {
        $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
        echo ucwords($domain) . ' Has <u>' . $indexed_pages . '</u> backlinks.';
    } else {
        echo ucwords($domain) . ' Has Not Been Indexed @ Google.com!';
    }
?>