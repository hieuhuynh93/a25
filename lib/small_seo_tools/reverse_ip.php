<?php

function str_contains($data, $searchString, $ignoreCase = false) {
    if ($ignoreCase) {
        $data = strtolower($data);
        $searchString = strtolower($searchString);
    }
    $needlePos = strpos($data, $searchString);
    return ($needlePos === false ? false : ($needlePos + 1));
}

function getMyData($site) {
    return file_get_contents($site);
}

function raino_trim($str) {
    $str = Trim(htmlspecialchars($str));
    return $str;
}

function clean_with_www($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://'), '', $site);
    return $site;
}

function clean_url($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'ftp://',
        'ftps://',
        'www.',
        'https://'), '', $site);
    return $site;
}

function reverseIP($revIP) {
    $link = "http://www.bing.com/search?q=ip%3A" . trim($revIP) .
            "&go=&qs=n&sk=&sc=8-5&form=QBLH";
    $source = getMyData($link);
    $s = explode('<span class="sb_count">', $source);
    $s = explode('<h4 class="b_hide">', $s[1]);
    $s = $s[0];
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";

    if (preg_match_all("/$regexp/siU", $s, $matches)) {
        foreach ($matches[2] as $link) {
            if (!str_contains($link, 'javascript:')) {
                if (!str_contains($link, 'microsofttranslator.com')) {
                    if (!str_contains($link, 'microsoft.com')) {
                        if (!str_contains($link, '#')) {
                            if (!str_contains($link, 'msn.com')) {
                                if (!str_contains($link, $revIP)) {
                                    $link = parse_url($link);
                                    $host = $link['host'];
                                    if ($host != null || $host != "")
                                        $revLink[] = $host;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    if (count($revLink) > 1)
        return array_unique($revLink);
    else
        return $revLink;
}

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = "https://" . clean_url($my_url);
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Invalid URL';
    } else {
        $regUserInput = $my_url;
        $my_url = parse_url($my_url);
        $host = $my_url['host'];
        $getHostIP = gethostbyname($host);
        $myHost = ucfirst(str_replace('www.', '', $host));
        $revLink = reverseIP($getHostIP);
        $revCount = count($revLink);
    }
}
?>

<table class="table table-bordered">
    <tbody>
        <tr>
            <td><?php echo 'Domain Name'; ?></td>
            <td><?php echo 'Domain IP'; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo $myHost; ?></strong></td>
            <td><strong><?php echo $getHostIP; ?></strong></td>
        </tr>
    </tbody>
</table>

<?php if ($revCount != 0) { ?>
    <br />
    <table class="table table-bordered" style="text-align: left;">
        <thead>
        <th style="width:20%">#</th>
        <th><?php echo 'Reverse Domain Names'; ?></th>
        </thead>
        <tbody>
            <?php
            $loop = 1;
            foreach ($revLink as $link) {
                ?>
                <tr>
                    <td style="width: 20%;"><?php echo $loop; ?></td>
                    <td><?php echo ucfirst(str_replace('www.', '', $link)); ?></td>
                </tr>
                <?php
                $loop = $loop + 1;
            }
            ?>
        </tbody>
    </table>

<?php }
?>