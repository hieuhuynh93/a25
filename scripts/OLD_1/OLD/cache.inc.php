<?php

/*
	Simple Cache With PHP
	http://www.beliefmedia.com/simple-php-cache
	http://shor.tt/1P7C
*/


function beliefmedia_set_transient($transient, $data) {

  /* You must define a location for your cache directory.. */
  $location = '/path/to/public_html/your/cache/' . $transient . '.txt';
   
  /* If the data is an array, we'll serialize it */
  if (is_array($data)) $data = serialize($data);

  /* Write string or serialized array to text file */
  $fp = @fopen($location, 'w');
  $result = fwrite($fp, $data);
  fclose($fp);

 return ($result !== false) ? true : false;
}


/*
	Simple Cache With PHP
	http://www.beliefmedia.com/simple-php-cache
	http://shor.tt/1P7C
*/


function beliefmedia_get_transient($transient, $cache = '21600') {

  /* You must define a location for your cache directory.. */
  $location = '/path/to/public_html/your/cache/' . $transient . '.txt';
   
  /* If the file exists and it hasn't expired, we'll return data, otherwise false */ 
  if ( file_exists($location) && (time() - $cache < filemtime($location)) ) {

    $result = @file_get_contents($location);
    if (beliefmedia_is_serialized($result) === true) $result = unserialize($result);
    
    /* Will return false anyhow... */
    return ($result) ? $result : false;

  } else {

    return false; 

  }
}


/*
	Simple Cache With PHP : http://shor.tt/1P7C
	http://www.beliefmedia.com/simple-php-cache
	https://codex.wordpress.org/Function_Reference/is_serialized
	Returns boolean (false if not serialized and true if it was)
*/


function beliefmedia_is_serialized( $data ) {
    // if it isn't a string, it isn't serialized
    if ( !is_string( $data ) )
        return false;
    $data = trim( $data );
    if ( 'N;' == $data )
        return true;
    if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
        return false;
    switch ( $badions[1] ) {
        case 'a' :
        case 'O' :
        case 's' :
            if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
                return true;
            break;
        case 'b' :
        case 'i' :
        case 'd' :
            if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
                return true;
            break;
    }
    return false;
}


/*
	Simple Cache With PHP http://shor.tt/1P7C
	http://www.beliefmedia.com/simple-php-cache
	Returns existing data (as an option)
*/


function beliefmedia_get_transient_data($transient) {

  /* You must define a location for your cache directory.. */
  $location = '/path/to/public_html/your/cache/' . $transient . '.txt';

  /* Get the data & creation time */
  if (file_exists($location)) {

    $data = file_get_contents($location);
    if (beliefmedia_is_serialized($data) === true) $data = unserialize($data);
    return $data;

  } else {

    return false;

  }
}


/*
	Simple Cache With PHP http://shor.tt/1P7C
	http://www.beliefmedia.com/simple-php-cache
	Returns data creation time
*/


function beliefmedia_get_transient_time($transient) {

  /* You must define a location for your cache directory.. */
  $location = '/path/to/public_html/your/cache/' . $transient . '.txt';

  /* Get creation time : http://php.net/manual/en/function.date.php */
  $creation_time = date('jS F g:ia', filemtime($location));
 
 return $creation_time;
}