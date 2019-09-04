<?php

//--------------- Checking Robot.TXT exist or not --------------
function remoteFileExists($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    $result = curl_exec($curl);
    $ret = false;
    if ($result !== false) {
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($statusCode == 200) {
            $ret = true;
        }
    }
    curl_close($curl);
    if ($ret) {
        $robottxt = "$url/robots.txt";
    } else {
        $robottxt = "N/A";
    }
    return $robottxt;
}

$url = "https://www.indiatimes.com";
echo remoteFileExists($url);
//----------------------- Getting All meta tags -----------------
$tags = get_meta_tags($url);

echo "<pre>";
print_r($tags);

//------------------ Checking if Domain is blacklisted OR Not---------------
/*
echo $ip = gethostbyname('ajio.com'); // die();

function dnsbllookup($ip) {
    // Add your preferred list of DNSBL's
    $dnsbl_lookup = [
        "dnsbl-1.uceprotect.net",
        "dnsbl-2.uceprotect.net",
        "dnsbl-3.uceprotect.net",
        "dnsbl.dronebl.org",
        "dnsbl.sorbs.net",
        "zen.spamhaus.org",
        "bl.spamcop.net",
        "list.dsbl.org",
        "sbl.spamhaus.org",
        "xbl.spamhaus.org"
    ];
    $listed = "";
    if ($ip) {
        $reverse_ip = implode(".", array_reverse(explode(".", $ip)));
        foreach ($dnsbl_lookup as $host) {
            if (checkdnsrr($reverse_ip . "." . $host . ".", "A")) {
                $listed .= $reverse_ip . '.' . $host . ' <font color="red">Listed</font><br />';
            }
        }
    }
    if (empty($listed)) {
        echo '"A" record was not found';
    } else {
        echo $listed;
    }
}

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo dnsbllookup($ip);
} else {
    echo "Please enter a valid IP";
}
*/
//------------------- Keyword density checker ------------------
$str = "I am working on a project where I have to find out the keyword density of the page on the basis of URL of that page. But I am not aware actually what \"keyword Density of a page\" actually means? and also please tell me how can we create a PHP script which will fetch the keyword density of a web page.";

// str_word_count($str,1) - returns an array containing all the words found inside the string
$words = str_word_count(strtolower($str),1);
$numWords = count($words);

// array_count_values() returns an array using the values of the input array as keys and their frequency in input as values.
$word_count = (array_count_values($words));
arsort($word_count);

foreach ($word_count as $key=>$val) {
    echo "$key = $val. Density: ".number_format(($val/$numWords)*100)."%<br/>\n";
}