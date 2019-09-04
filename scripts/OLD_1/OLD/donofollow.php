<?php

//$url = "https://www.w3schools.com/quiztest/quiztest.asp?Qtest=XML";
$url = "https://www.w3schools.com/js/js_examples.asp";
$robotPath = "http://25saints.com/Masterajib/Project_SEO/media/link_analysis/1/28/robots.txt";



function getRobots($url, $robotPath) {
    $robotsUrl = $robotPath;
    $robot = null;
    //create an object
    $allRobots = [];
    $fh = fopen($robotsUrl, 'r');
    while (($line = fgets($fh)) != false) {
        echo $line . "<br>";
        if (preg_match("/user-agent.*/i", $line)) {
            if ($robot != null) {
                array_push($allRobots, $robot);
            }

            $robot = new stdClass();
            $robot->userAgent = [];
            $robot->userAgent = explode(':', $line, 2)[1];
            $robot->disAllow = [];
            $robot->allow = [];
        }
        if (preg_match("/disallow.*/i", $line)) {
            array_push($robot->disAllow, explode(':', $line, 2)[1]);
        } else if (preg_match("/^allow.*/i", $line)) {
            array_push($robot->allow, explode(':', $line, 2)[1]);
        }
    }


    if ($robot != null) {
        array_push($allRobots, $robot);
    }


    //Lazy way of outputting. Loop through for prettier output.
    echo "<pre>";
    print_r($allRobots);
}

getRobots($url, $robotPath);