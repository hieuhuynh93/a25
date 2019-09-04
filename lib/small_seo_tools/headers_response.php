   
<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = 'https://' . clean_url(raino_trim($_REQUEST['url']));

    $headers = _curl_headers($my_url);
}
?>

<table class='table table-bordered table-striped' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
    <tr>
        <th>
            <h5> Your Website's Header Response <br /><br /></h5>
        </th>
    </tr>
    <tr style='text-align: left;'>
        <td style='color: black;'><?php echo $headers; ?></td>
    </tr>
</table>