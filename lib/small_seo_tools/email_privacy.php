<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url']))
    $my_url = raino_trim($_REQUEST['url']);
$my_url = clean_with_www($my_url);
$my_url = "https://$my_url";
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
    $error = $lang['327'];
} else {
    $regUserInput = $my_url;
    $content = curlGET($my_url);
    if ($content == null || $content == "") {
        $error = 'Error';
    } else {
        preg_match_all("/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/", $content, $matches, PREG_SET_ORDER);

        if (count($matches) == 0) {
            $noEmail = 'Success, No Emails found.';
        } else {
            foreach ($matches as $email) {
                $emailList[] = $email[0];
            }
        }
    }
}
?>  
<p><?php echo 'URL'; ?>: <strong><?php echo $my_url; ?></strong> </p>
<?php if (isset($noEmail)) { ?>
    <p><?php echo 'Status'; ?>: <strong style="color:green;"><?php echo $noEmail; ?></strong> </p>
    <br />
    <div class="text-center"> 
        <img  src="http://www.socicos.com/lib/small_seo_tools/images/okay.png" alt="success" title="Success" />
    </div>
<?php } else { ?>
    <p><?php echo 'Status'; ?>: <strong style="color:red;"><?php echo 'Email Found!'; ?></strong> </p>
    <br />
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>No.</th>
                <th><?php echo 'Email ID'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $loopCount = 1;
            foreach ($emailList as $email) { ?>
                <tr>
                    <td><?php echo $loopCount; ?></td>
                    <td><strong><?php echo $email; ?></strong></td>
                </tr>
        <?php $loopCount = $loopCount + 1;
    } ?>
        </tbody></table>
<?php } ?>