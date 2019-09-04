<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

?> 
<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url']))
$my_url = raino_trim($_REQUEST['url']);
$my_url = "https://" . clean_url($my_url);
?>

<?php

if (isset($_REQUEST['url']))
define("OUTPUT_FILE", "sitemap_" . $_REQUEST['url'] . ".xml");


// Set the start URL. Example: define ("SITE", "https://www.example.com");
if (isset($_REQUEST['url']))
define("SITE", $_REQUEST['url']);


// Set true or false to define how the script is used.
// true:  As CLI script.
// false: As Website script.
define("CLI", false);


// Define here the URLs to skip. All URLs that start with the defined URL 
// will be skipped too.
// Example: "https://www.example.com/print" will also skip
//   https://www.example.com/print/bootmanager.html
$skip_url = array(
SITE . "/print",
 SITE . "/slide",
);


// General information for search engines how often they should crawl the page.
define("FREQUENCY", "weekly");


// General information for search engines. You have to modify the code to set
// various priority values for different pages. Currently, the default behavior
// is that all pages have the same priority.
define("PRIORITY", "0.5");


// When your web server does not send the Content-Type header, then set
// this to 'true'. But I don't suggest this.
define("IGNORE_EMPTY_CONTENT_TYPE", false);



/* * ***********************************************************
  End of user defined settings.
 * *********************************************************** */


// Skip URLs from the $skip_url array

$count = 0;

// Program start
define("VERSION", "2.4");
define("NL", CLI ? "\n" : "<br>");

// Print configuration
/*    echo "Plop PHP XML Sitemap Generator Configuration:" . NL;
  echo "VERSION: " . VERSION . NL;
  echo "OUTPUT_FILE: " . OUTPUT_FILE . NL;
  echo "SITE: " . SITE . NL;
  echo "CLI: " . (CLI ? "true" : "false"). NL;
  echo "IGNORE_EMPTY_CONTENT_TYPE: " . (IGNORE_EMPTY_CONTENT_TYPE ? "true" : "false") . NL;
  echo "DATE: " . date ("Y-m-d H:i:s") . NL;
  echo NL;
 */
// SITE configuration check    
//if (!SITE)
//{
//die ("ERROR: You did not set the SITE variable at line number " . 
//"68 with the URL of your website!\n");
//}

define("AGENT", "Mozilla/5.0 (compatible; Plop PHP XML Sitemap Generator/" . VERSION . ")");
define("SITE_SCHEME", parse_url(SITE, PHP_URL_SCHEME));
define("SITE_HOST", parse_url(SITE, PHP_URL_HOST));

error_reporting(E_ERROR | E_WARNING | E_PARSE);


$pf = fopen("/var/www/html/lib/small_seo_tools/site_map/" . OUTPUT_FILE, "w");

if (!$pf) {
echo "ERROR: Cannot create " . OUTPUT_FILE . "!" . NL;
return;
}

fwrite($pf, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" .
"<!-- Date: " . date("Y-m-d H:i:s") . " -->\n" .
"<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n" .
"        xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n" .
"        xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\" >\n" .
"  <url>\n" .
"    <loc>" . SITE . "/</loc>\n" .
"    <changefreq>" . FREQUENCY . "</changefreq>\n" .
"    <priority>" . PRIORITY . "</priority>\n" .
"  </url>\n");

echo "Scan Started..." . NL . NL;
$scanned = array();
Scan(GetEffectiveURL(SITE));

fwrite($pf, "</urlset>");
fclose($pf);

echo NL . "Done Scanning <u>" . $_SESSION['count'] . "</u> link(s)." . NL . "<small><b>(Invalid Links are Not Scanned or Displayed)</b></small>" . NL . NL;
$_SESSION['count'] = 1;
echo '<b>' . OUTPUT_FILE . "</b> created." . NL;

$_SESSION['df'] = OUTPUT_FILE;
?>
<br /><a href='download.php' class='btn btn-info'><i class='fa fa-download'></i> Download XML SiteMap</a><br />
<small><b>(Rename file to 'sitemap.xml' after download and upload it to your server)</b></small>
<?php ?>
<br />
