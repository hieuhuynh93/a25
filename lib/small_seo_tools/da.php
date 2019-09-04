<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $outData = clean_url(raino_trim($_REQUEST['url']));
    $accessID = 'mozscape-6467265d46';
    $secretKey = 'ceb9af1aba21f168cf26ff192927c041';
    if (!$accessID || !$secretKey)
        return 0;
    $expires = time() + 300;
    $stringToSign = $accessID . "\n" . $expires;
    $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
    $urlSafeSignature = urlencode(base64_encode($binarySignature));
    $objectURL = $outData;
    $cols = "103079231492";
    $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL)
            . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
    $options = array(
        CURLOPT_RETURNTRANSFER => true
    );
    $ch = curl_init($requestUrl);
    curl_setopt_array($ch, $options);
    $content = (curl_exec($ch));
    curl_close($ch);
    $array1 = explode(',', $content);
    $umrp = explode(":", $array1[1]);
    $pa = explode(":", $array1[3]);
    $da = explode(":", $array1[4]);
}
?>
<table class='table table-bordered table-striped'>
    <tr>
        <th>URL</th>
        <th>DA</th>
    </tr>
    <tr>
        <td><?php echo ucfirst($_REQUEST['url']); ?></td>
        <?php if ((int) $da[1] >= 60) { ?>
            <td class='text-success'><b><?php echo (int) $da[1]; ?></b></td>
        <?php } ?>
        <?php if ((int) $da[1] < 60 && (int) $da[1] >= 30) { ?>
            <td class='text-warning'><b><?php echo (int) $da[1]; ?></b></td>
        <?php } ?>
        <?php if ((int) $da[1] < 30) { ?>
            <td class='text-danger'><b><?php echo (int) $da[1]; ?></b></td>
                <?php } ?>
    </tr>
</table>