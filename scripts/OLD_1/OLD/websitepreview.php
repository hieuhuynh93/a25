<?php
$url = 'http://www.mensxp.com';
$ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    
    $data = curl_exec($ch);
    curl_close($ch);
    
    // Load HTML to DOM Object
    $dom = new DOMDocument();
    @$dom->loadHTML($data);
    
    // Parse DOM to get Title
    $nodes = $dom->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    
    // Parse DOM to get Meta Description
    $metas = $dom->getElementsByTagName('meta');
    $body = "";
    for ($i = 0; $i < $metas->length; $i ++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'description') {
            $body = $meta->getAttribute('content');
        }
    }
    
    // Parse DOM to get Images
    $image_urls = array();
    $images = $dom->getElementsByTagName('img');
     
     for ($i = 0; $i < $images->length; $i ++) {
         $image = $images->item($i);
         $src = $image->getAttribute('src');
         
         if(filter_var($src, FILTER_VALIDATE_URL)) {
             $image_src[] = $src;
         }
     }
    
    $output = array(
        'title' => $title,
        'image_src' => $image_src,
        'body' => $body
    );
    //echo json_encode($output);

echo "<pre>"; print_r($output['image_src']);