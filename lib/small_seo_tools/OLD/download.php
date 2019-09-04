<?php

session_start();
$file = $_SESSION['df'];

if (file_exists($file)) {
    @header('Content-Description: File Transfer');
    @header('Content-Type: text/xml');
    @header('Content-Disposition: attachment; filename="'.$file.'"');
    @header('Expires: 0');
    @header('Cache-Control: must-revalidate');
    @header('Pragma: public');
    @header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
else
{
    echo 'File doesn\'t exist';
}

?>