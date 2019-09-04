<?php
require_once 'all_functions.php';

$domain = strtolower($_REQUEST['url']);
$domain = trim($domain);
$domain_curl = "www." . $domain;
$technologies = getBuiltWith($domain);

if (isset($_REQUEST['url'])) {
    $my_url = 'https://www.' . clean_url(raino_trim($_REQUEST['url']));
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $obj = new KD();
        $obj->domain = ($my_url);
        $resdata = $obj->result();

        foreach ($resdata as $outData) {
            $outData['keyword'] = Trim($outData['keyword']);
            if ($outData['keyword'] != null || $outData['keyword'] != "") {

                $blockChars = array('~', '=', '+', '?', ':', '_', '[', ']', '"', '.', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '{', '}', '|', '\\', '/', ',');
                $blockedStr = false;
                foreach ($blockChars as $blockChar) {
                    if (str_contains($outData['keyword'], $blockChar)) {
                        $blockedStr = true;
                        break;
                    }
                }
                //if (ctype_alnum($outData['keyword'])) {
                if (!preg_match('/[0-9]+/', $outData['keyword'])) {
                    if (!$blockedStr)
                        $outArr[] = array($outData['keyword'], $outData['count'], $outData['percent']);
                }
            }
        }
        $outCount = count($outArr);
        if ($outCount == 0) {
            $error = 'No Data';
        }
        $myUrl = ucfirst(str_replace('www.', '', $my_url));
    }
    $stats = getStatsData($domain, $technologies);
}
?>

<?php
$ret = getMyMeta($my_url);
$title = $ret[0];
$description = $ret[1];
$keywords = $ret[2];
?>
<div class="table-bordered" id="meta" style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
    <div class="row p-t-2 ">
        <div class="col-lg-4">

            <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Charset"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Encoding"); ?></small>
        </div>
        <?php if ($stats['charset']) { ?>
            <div class="col-lg-8 text-muted">
                <?php echo ("<i style='color: green;'>Great</i>, language/character encoding is specified:"); ?>  <strong><i class="zmdi zmdi-check"></i> <?php echo mb_strtoupper($stats['charset']); ?></strong>
            </div>
        </div><br />
    <?php } else { ?>
        <div class="col-lg-8 text-muted">
            <?php echo ("<i style='color: red;'>Oops</i>, language/character encoding is not specified:"); ?>  <strong><i class="zmdi zmdi-close"></i> <?php echo ' None'; ?></strong>
        </div>
    </div><br />
<?php } ?>

<div class="row p-t-2 ">
    <div class="col-lg-4">
        <?php
        $metaTitle = validateLenght($stats['metaTitle'], 60, 5);
        ?>
        <strong><i class="zmdi <?php echo $metaTitle['icon']; ?> <?php echo $metaTitle['color']; ?> check"></i> <?php echo ("Title Tag"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo number_format($metaTitle['lenght']); ?> <?php echo ("Characters"); ?></small>
    </div>
    <div class="col-lg-8 text-muted">
        <?php echo $metaTitle['fixed']; ?>
    </div>
</div><br />

<div class="row  p-t-2">
    <div class="col-lg-4">

        <?php
        $metaDescription = validateLenght($stats['metaDescription'], 150, 10);
        ?>

        <strong><i class="zmdi <?php echo $metaDescription['icon']; ?> <?php echo $metaDescription['color']; ?> check"></i> <?php echo ("Meta Description"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo number_format($metaDescription['lenght']); ?> <?php echo ("Characters"); ?></small>
    </div>
    <div class="col-lg-8 text-muted">
        <?php echo $metaDescription['fixed']; ?>

    </div>
</div><br />


<?php if ($stats['url_real']) { ?>
    <div class="row p-t-2 ">
        <div class="col-lg-4 ">
            <?php
            $url_real = validateLenght($stats['url_real'], 50, 1);
            ?>
            <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Effective URL"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo number_format($url_real['lenght']); ?> <?php echo ("Characters"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo "<a style='color: blue;' href='" . $stats['url_real'] . "'>" . $stats['url_real'] . "</a>"; ?>
        </div>
    </div><br />
<?php } ?>


<?php
$body_excerpt = badWords(more($stats['body'], 250));
if (strlen($body_excerpt) < 20)
    $body_excerpt = false;
?>
<?php if ($body_excerpt) { ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">


            <strong><i class="zmdi  zmdi-dot-circle  check"></i> <?php echo ("Excerpt"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Page content"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo $body_excerpt; ?>

        </div>
    </div><br />
<?php } ?>



<?php if ($stats['metaKeywords'] != '') { ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <?php
            $keywords = explode(",", $stats['metaKeywords']);
            $keywordsCount = count($keywords);
            if ($stats['metaKeywords'] == '') {
                $keywords = false;
                $keywordsCount = 0;
            }
            ?>
            <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Meta Keywords"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ($keywordsCount); ?> <?php echo ("Detected"); ?></small>
        </div>
        <div class="col-lg-8">
            <?php
            foreach ($keywords as $key => $value) {
                $value = rtrim(ltrim(badWords($value)));
                if (trim($value) != '') {
                    ?>
                    <?php echo $value . ', '; ?>
                    <?php
                }
            }
            ?>


        </div>
    </div><br />
<?php } ?>

<?php
?>
<div class="row  p-t-2">
    <div class="col-lg-4">
        <?php ?>
        <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Keywords Cloud"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo ("Density"); ?></small>
    </div>
    <div class="col-lg-8">
        <?php
        $count = 0;
        foreach ($outArr as $value) {
            if ($count == 10)
                break;
            $count++;
            $value[0] = badWords($value[0]);
            if (trim($value[0]) != '') {
                ?>
                <span  class="keyword-cloud" style='margin-left: 2%;'><?php echo more($value[0], 30); ?> <span style='color: white;' class="value animated zoomIn badge bg-success"><?php echo $value[1]; ?></span></span>
                <?php
            }
        }
        ?>


    </div>
</div><br />


<div class="row  p-t-2">
    <div class="col-lg-4">
        <?php ?>
        <strong><i class="zmdi zmdi-badge-check check"></i> <?php echo ("Keyword Consistency"); ?></strong>
        <small class= "d-block subtitle"><?php echo ("Keyword density is one of the main terms in SEO"); ?></small>
    </div>
    <div class="col-lg-8">
        <table class="consistency table table-responsive">
            <tr class="header">
                <td><?php echo ("Keyword"); ?></td>
                <td class="text-xs-center"><?php echo ("Frequency"); ?></td>
                <td class="text-xs-center"><?php echo ("Title"); ?></td>
                <td class="text-xs-center"><?php echo ("Description"); ?></td>
                <td class="text-xs-center"><?php echo ("Domain"); ?></td>
                <td class="text-xs-center"><?php echo ("H1"); ?></td>
                <td class="text-xs-center"><?php echo ("H2"); ?></td>
                <td class="text-xs-center"><?php echo ("H3"); ?></td>
                <td class="text-xs-center"><?php echo ("H4"); ?></td>
            </tr>
            <?php
            $count1 = 0;
            foreach ($outArr as $value) {
                if ($count1 == 10)
                    break;
                $count1++;
                ?>
                <tr>
                    <td><i class="zmdi zmdi-tag text-muted check"></i> <?php echo more(badWords($value[0]), 20); ?></td>
                    <td class="text-center "><?php echo $value[1]; ?></td>
                    <td class="text-center">
                        <?php
                        if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($value[0])) !== FALSE) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>

                    <td class="text-center">
                        <?php
                        if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($value[0])) !== FALSE) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>

                    <td class="text-center">
                        <?php
                        if (mb_strpos(mb_strtolower($stats['url']), mb_strtolower($value[0])) !== FALSE) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>	

                    <td class="text-center">
                        <?php
                        if (inHX($stats['body'], $value[0], "h1")) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>

                    <td class="text-center">
                        <?php
                        if (inHX($stats['body'], $value[0], "h2")) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>

                    <td class="text-center">
                        <?php
                        if (inHX($stats['body'], $value[0], "h3")) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>

                    <td class="text-center">
                        <?php
                        if (inHX($stats['body'], $value[0], "h4")) {
                            ?>
                            <i class="zmdi zmdi-check text-success"></i> 
                            <?php
                        } else {
                            ?>
                            <i class="zmdi zmdi-close text-danger"></i> 
                            <?php
                        }
                        ?>
                    </td>


                </tr>
                <?php
            }
            ?>
        </table>


    </div>
</div><br />
<div class="row  p-t-2">
    <div class="col-lg-4">
        <strong><i class="zmdi zmdi-eye text-muted check"></i> <?php echo ("Google Preview"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo ("Your website looks like this in google search result "); ?></small>
    </div>
    <div class="card col-lg-7" style='border: 3px solid lightgray;'>
        <div class="gsearch">
            <div style='color: blue;font-size: 18px;' class="title"><?php
            if ($stats['metaTitle']) {
                echo $stats['metaTitle'];
            } else {
                echo badWords($stats['url']);
            }
            ?></div>
                <?php
            $site_url = $stats['url'];
            if ($stats['url_real'])
                $site_url = $stats['url_real'];
            ?>
            <div style='color: green;font-weight: bold;' class="url"><?php echo badWords($site_url); ?></div>
            <div class="desc">
                <?php
                if ($stats['metaDescription']) {
                    echo substr($stats['metaDescription'], 0, 70) . '...';
                } else {
                    echo $body_excerpt;
                }
                ?>
            </div>
        </div>

    </div>
</div><br />

<?php
$detected[0] = ("File Not Found");
$detected[1] = ("File Detected");
?>
<div class="row  p-t-2">
    <div class="col-lg-4">
        <strong><i class="zmdi <?php echo getIcon($stats['robots'], 0); ?> <?php echo getColor($stats['robots'], 0); ?> check"></i> <?php echo ("Robots.txt"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo $detected[$stats['robots']]; ?></small>
    </div>
    <div class="col-lg-8">
        <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/robots.txt</a>						
    </div>
</div><br />


<div class="row  p-t-2">
    <div class="col-lg-4">
        <strong><i class="zmdi  <?php echo getIcon($stats['sitemap'], 0); ?> <?php echo getColor($stats['sitemap'], 0); ?> check"></i> <?php echo ("Sitemap.xml"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo $detected[$stats['sitemap']]; ?></small>
    </div>
    <div class="col-lg-8">
        <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/sitemap.xml</a>

    </div>
</div><br />

<?php
$document_size = strBytes($stats['body']);
$text_size = strBytes(strip_tags($stats['body']));
$code_size = $document_size - $text_size;
$text_ratio = (($text_size * 100) / $document_size);
?>
<div class="row  p-t-2">
    <div class="col-lg-4">
        <strong><i class="zmdi  <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?> check"></i> <?php echo ("Page Size"); ?></strong>
        <small class="text-muted d-block subtitle"><?php echo ("Code & Text Ratio"); ?></small>
        <small class="d-block subtitle">
            <progress style='background-color: lightgray;' class="progress-bar progress-bar-striped" value="<?php echo $text_ratio; ?>" max="100"></progress>
        </small>
    </div>
    <div class="col-lg-8">
        <div class="text-muted text-small p-t-0">
            <div class="truncate"><i class="zmdi <?php echo getIcon(2000000, $document_size); ?> <?php echo getColor(2000000, $document_size); ?>  check"></i> <?php echo ("Document Size:"); ?> ~<?php echo formatBytes($document_size); ?></div>
            <div class="truncate"><i class="zmdi <?php echo getIcon($code_size, 20); ?> <?php echo getColor($code_size, 20); ?>  check"></i> <?php echo ("Code Size:"); ?> ~<?php echo formatBytes($code_size); ?></div>
            <div class="truncate"><i class="zmdi <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?>  check"></i> <?php echo ("Text Size:"); ?> ~<?php echo formatBytes($text_size); ?> <strong class=""><?php echo ("Ratio:"); ?> <?php echo number_format($text_ratio, 2); ?>%</strong></div>


        </div>
    </div>

</div>