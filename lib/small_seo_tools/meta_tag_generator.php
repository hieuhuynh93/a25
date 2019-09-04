<?php
require_once 'all_functions.php';

$metaTitle = raino_trim($_REQUEST['title']);
$metaDescription = raino_trim($_REQUEST['description']);
$metaKeywords = raino_trim($_REQUEST['keywords']);
$robotsIndex = raino_trim($_REQUEST['robotsIndex']);
$robotsLinks = raino_trim($_REQUEST['robotsLinks']);
$contentType = raino_trim($_REQUEST['contentType']);
$metaLang = raino_trim($_REQUEST['language']);
$revisitdays = raino_trim($_REQUEST['revisitdays']);
$authorname = raino_trim($_REQUEST['authorname']);

$checkRevisit = raino_trim($_REQUEST['revisit']);
$checkRevisit = filter_var($checkRevisit, FILTER_VALIDATE_BOOLEAN);
$checkAuthor = raino_trim($_REQUEST['author']);
$checkAuthor = filter_var($checkAuthor, FILTER_VALIDATE_BOOLEAN);

$outData = genMeta($metaTitle, $metaDescription, $metaKeywords, $robotsIndex, $robotsLinks, $contentType, $metaLang, $revisitdays, $authorname, $checkRevisit, $checkAuthor);
?>
<textarea name="outdata" rows="10" readonly="" style="width: 80%;"><?php echo $outData; ?></textarea>