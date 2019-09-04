<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $userInput = stripslashes($_REQUEST['url']);
    $regUserInput = truncate($userInput, 30, 150);
    $out_data_e = urlencode($userInput);
    $out_data_d = urldecode($userInput);
}
?>

<?php echo 'Original Input:  ' . ucfirst($_POST['url']) . '<br /><br />Encoded URL'; ?> <br />
<textarea id="textArea" rows="5" class="form-control" readonly="readonly"><?php echo $out_data_e; ?></textarea><br />
<?php echo 'Decoded URL'; ?> <br />
<textarea id="textArea" rows="5" class="form-control" readonly="readonly"><?php echo $out_data_d; ?></textarea>

