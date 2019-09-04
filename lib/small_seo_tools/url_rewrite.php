<?php
require_once 'all_functions.php';

function split_up_me($url) {
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    $arg_arr = explode("&", $arr['query']);
    $file_arr = explode("/", $arr['path']);

    foreach ($file_arr as $val) {
        $filename = $val;
    }

    $file_without = explode(".", $filename);
    $file_without = $file_without[0];

    foreach ($arg_arr as $val) {
        $arg[] = explode("=", $val);
    }
    return array(
        $filename,
        $file_without,
        $arg);
}

function checkDyn($url) {
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    if ($arr['query'] == '') {
        return '0';
    } else {

        return '1';
    }
}

if (isset($_REQUEST['url'])) {
    $r_1 = $r_2 = $r_3 = "";
    $my_url9 = "https://" . clean_url(raino_trim($_REQUEST['url']));
    if (filter_var($my_url9, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url9;
        $arr = parse_url($my_url9);
        $checkDyn = checkDyn($my_url9);
        if ($checkDyn == '0') {
            $error = 'URL not Dynamic'; //'URL entered does not seem to be a dynamic URL';        
        } else {
            $my_domain = clean_with_www($arr['host']);
            $example_url = $arr['scheme'] . "://" . $arr['host'] . $arr['path'];
            $arr_val = split_up_me($my_url9);
            $filename = Trim($arr_val[0]);
            $f_without_e = Trim($arr_val[1]);
            $parsed_arg = $arr_val[2];
            $start = 1;

            $sht_url = str_replace($filename, "", $example_url);
            $sht_url = $sht_url . $f_without_e;
            $dht_ex_url = $dht_url = $sht_ex_url = $sht_url;

            foreach ($parsed_arg as $argf => $value) {
                if ($start == 1) {
                    $syb = "?";
                } else {
                    $syb = "&";
                }
                $sht_url = $sht_url . "-" . $value[0] . "-" . $value[1];
                $dht_url = $dht_url . "/" . $value[0] . "/" . $value[1];
                $dht_ex_url = $dht_ex_url . "/" . $value[0] . "/(Any Value)";
                $sht_ex_url = $sht_ex_url . "-" . $value[0] . "-(Any Value)";
                $r_1 = $r_1 . "-$value[0]-(.*)";
                $r_2 = $r_2 . $syb . "$value[0]=$$start";
                $r_3 = $r_3 . "/$value[0]/(.*)";
                $start++;
            }
            $sht_url = Trim($sht_url) . ".htm";
            $dht_url = Trim($dht_url) . "/";
            $sht_ex_url = Trim($sht_ex_url) . ".htm";
            $dht_ex_url = Trim($dht_ex_url) . "/";
            $sht_data = "Options +FollowSymLinks\r\nRewriteEngine on\r\nRewriteRule $f_without_e" . Trim($r_1) . "\.htm$ $filename" . Trim($r_2);
            $dht_data = "Options +FollowSymLinks\r\nRewriteEngine on\r\nRewriteRule $f_without_e" . Trim($r_3) . "/ $filename" . Trim($r_2) . "\r\nRewriteRule $f_without_e" . Trim($r_3) . " $filename" . Trim($r_2);
        }
    }
}
?>
<b><?php echo 'Type 1 - Single Page URL'; ?></b><br />
<table class="table table-bordered">
    <tbody>
        <tr>
            <td><strong><?php echo 'Generated URL'; ?></strong></td>
            <td><?php echo $sht_url; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Example URL'; ?></strong></td>
            <td><?php echo $sht_ex_url; ?></td>
        </tr>
    </tbody></table>

<?php echo 'Create a .htaccess file with the code below'; ?><br />
<?php echo 'The .htaccess file needs to be placed in ' . $my_domain; ?><br />
<textarea rows="5" class="form-control" readonly="" style="width: 80%;"><?php echo $sht_data; ?></textarea>

<br /> <br /> <b><?php echo 'Type 2 -Directory Type URL'; ?></b> <br />

<table class="table table-bordered">
    <tbody>
        <tr>
            <td><strong><?php echo 'Generated URL'; ?></strong></td>
            <td><?php echo $dht_url; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Example URL'; ?></strong></td>
            <td><?php echo $dht_ex_url; ?></td>
        </tr>
    </tbody></table>
<?php echo 'Create a .htaccess file & copy the code below'; ?><br />
<?php echo 'The .htaccess file needs to be placed in ' . $my_domain; ?><br />
<textarea rows="5" class="form-control" readonly="" style="width: 80%;"><?php echo $dht_data; ?></textarea>