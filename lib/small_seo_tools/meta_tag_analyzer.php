<?php
include 'all_functions.php';
/*function getMyMeta($url, $noTitle = 'No Title', $noDes = 'No Description', $noKey = 'No Keywords') {

    $title = $description = $keywords = $html = $author = $siteName = '';
    $viewport = '-';
    $lenTitle = $lenDes = 0;
    $openG = false;

    //Get Data of the URL
    $html = curlGET($url);

    if ($html == '')
        return false;

    //Fix Meta Uppercase Problem
    $html = str_ireplace(array("Title", "TITLE"), "title", $html);
    $html = str_ireplace(array("Description", "DESCRIPTION"), "description", $html);
    $html = str_ireplace(array("Keywords", "KEYWORDS"), "keywords", $html);
    $html = str_ireplace(array("Content", "CONTENT"), "content", $html);
    $html = str_ireplace(array("Meta", "META"), "meta", $html);
    $html = str_ireplace(array("Name", "NAME"), "name", $html);

    //Load the document and parse the meta     
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    $metas = $doc->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'description')
            $description = $meta->getAttribute('content');
        if ($meta->getAttribute('name') == 'keywords')
            $keywords = $meta->getAttribute('content');
        if ($meta->getAttribute('name') == 'viewport')
            $viewport = $meta->getAttribute('content');
        if ($meta->getAttribute('name') == 'author')
            $author = $meta->getAttribute('content');
        if ($meta->getAttribute('property') == 'site_name')
            $siteName = $meta->getAttribute('content');
        if ($meta->getAttribute('property') == 'og:title')
            $openG = true;
    }

    $lenTitle = mb_strlen($title);
    $lenDes = strlen($description);

    //Check Empty Data
    $title = ($title == '' ? $noTitle : $title);
    $description = ($description == '' ? $noDes : $description);
    $keywords = ($keywords == '' ? $noKey : $keywords);

    //Return as Array
    return array($title, $description, $keywords, $openG, $lenTitle, $lenDes, $viewport, $author, $siteName);
}*/

$htmlMetaTable = '';

    if (isset($_REQUEST['url'])) {
        $myUrl = clean_url($_REQUEST['url']);
        $arr_meta = getMyMeta($myUrl);
        
        //echo "<pre>"; print_r($arr_meta); die();
        
        $htmlMetaTable .= '<tr><td>1</td><td>Page URL</td><td>'.$myUrl.'</td></tr>';
        $htmlMetaTable .= '<tr><td>2</td><td>Meta Title</td><td><strong>'.$arr_meta[0].'</strong> <hr class="tableHr" /><span class="green">'.str_replace('[count]', $arr_meta[4], 'Ideally, your title tag should contain between 10 and 70 characters').'</span></td></tr>';
        $htmlMetaTable .= '<tr><td>3</td><td>Meta Description</td><td><strong>'.$arr_meta[1].'</strong> <hr class="tableHr" /><span class="green">'.str_replace('[count]', $arr_meta[5], 'Meta descriptions should contain between 160 and 320 characters').'</span></td></tr>';
        $htmlMetaTable .= '<tr><td>4</td><td>Meta Keywords</td><td style="word-wrap: break-word;max-width: 300px;"><strong>'.$arr_meta[2].'</strong></td></tr>';
        $htmlMetaTable .= '<tr><td>5</td><td>Meta Viewport</td><td>'.$arr_meta[6].'</td></tr>';
        $htmlMetaTable .= '<tr><td>6</td><td>Open Graph</td><td>'.$arr_meta[8].'</td></tr>';
        $htmlMetaTable .= '<tr><td>7</td><td>Open GraphL</td><td>'.$arr_meta[7].'</td></tr>';
    }
    echo json_encode(array('htmlTableMeta' => $htmlMetaTable));
    
?>
     		
