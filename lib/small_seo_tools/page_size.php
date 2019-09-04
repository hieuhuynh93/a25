<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = clean_url($my_url);
    $my_url = Trim("https://$my_url");
    /* if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
      $error = 'Error';
      } else {
      $regUserInput = $my_url;
      $size = getPageSize($my_url);
      $kb_size = size_as_kb($size);
      
      } */
    
    $myUrl = ucfirst($my_url);

    $curl = curl_init($_REQUEST['url']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $subject = curl_exec($curl);
    $filesize = curl_getinfo($curl, CURLINFO_SIZE_DOWNLOAD);
    $sizeInKb = convertFileSize($filesize);
}

function convertFileSize($bytes) {
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td><strong><?php echo 'Page URL'; ?></strong></td>
            <td><?php echo $myUrl; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Page Size (Bytes)'; ?></strong></td>
            <td><?php echo $filesize; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Page Size (KB)'; ?></strong></td>
            <td><?php echo $sizeInKb; ?> KB</td>
        </tr>
    </tbody>
</table>