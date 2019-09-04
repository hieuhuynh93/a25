<?php

$name = $_REQUEST['username'];

$client_id = "7eu0ll5i7jb563t2fh983ctsaeclhq"; //app client id
$secrateId = "htil26xdos60n8zr1u8gpiw7n4ecx3";
$json = json_decode(file_get_contents('https://api.twitch.tv/kraken/channels/'. $name .'?client_id='. $client_id));
//echo $json->logo;

echo json_encode($json);
?>
