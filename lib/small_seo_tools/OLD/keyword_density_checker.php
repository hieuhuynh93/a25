<!DOCTYPE html>
<?php include_once 'dbconn.php'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Font -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <style>
            .x a:hover {
                background-color: gray;
                color: white;
            }
            .card-deck {
                @include -media-breakpoint-only(lg) {
                    column-count: 4;
                }
                @include -media-breakpoint-only(xl) {
                    column-count: 3;
                }
            }
        </style>
    </head>

    <body>

        <div class="wrapper">

            <!--=================================
             preloader -->

            <!--div id="pre-loader">
                <img src="images/pre-loader/loader-01.svg" alt="">
            </div-->

            <!--=================================
             preloader -->

            <!--=================================
             header start-->

            <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <!-- logo -->
                <div class="text-left navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo-dark.png" alt="" ></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-icon-dark.png" alt=""></a>
                </div>
                <!-- Top bar left -->
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                    </li>
                    <li class="nav-item">
                        <div class="search">
                            <a class="search-btn not_click" href="javascript:void(0);"></a>
                            <div class="search-box not-click">
                                <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                                <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- top bar right -->
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item fullscreen">
                        <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell"></i>
                            <span class="badge badge-danger notification-status"> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                            <div class="dropdown-header notifications">
                                <strong>Notifications</strong>
                                <span class="badge badge-pill badge-warning">05</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">New registered user <small class="float-right text-muted time">Just now</small> </a>
                            <a href="#" class="dropdown-item">New invoice received <small class="float-right text-muted time">22 mins</small> </a>
                            <a href="#" class="dropdown-item">Server error report<small class="float-right text-muted time">7 hrs</small> </a>
                            <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1 days</small> </a>
                            <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2 days</small> </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big">
                            <div class="dropdown-header">
                                <strong>Quick Links</strong>
                            </div>
                            <div class="dropdown-divider"></div> 
                            <div class="nav-grid">
                                <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i><h5>New Task</h5></a>
                                <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i><h5>Assign Task</h5></a>
                            </div>
                            <div class="nav-grid">
                                <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i><h5>Add Orders</h5></a>
                                <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i><h5>New Orders</h5></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-30">
                        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="images/profile-avatar.jpg" alt="avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0">Michael Bean</h5>
                                        <span>michael-bean@mail.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                            <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                            <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                            <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!--=================================
             header End-->

            <!--=================================
             Main content -->

            <div class="container-fluid">
                <div class="row">
                    <!-- Left Sidebar -->
                    <div class="side-menu-fixed">
                        <div class="scrollbar side-menu-bg">
                            <ul class="nav navbar-nav side-menu" id="sidebarnav">
                                <!-- menu item Dashboard-->
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span></div>
                                        <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                                    </a>
                                    <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                        <li> <a href="index.html">Dashboard 01</a> </li>
                                        <li> <a href="index-02.html">Dashboard 02</a> </li>
                                        <li> <a href="index-03.html">Dashboard 03</a> </li>
                                        <li> <a href="index-04.html">Dashboard 04</a> </li>
                                        <li> <a href="index-05.html">Dashboard 05</a> </li>
                                    </ul>
                                </li>
                                <!-- menu title -->
                                <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                                <!-- menu item Elements-->
                                <li>
                                    <a href="quiz.php" class='active'>
                                        <div class="pull-left"><i class="ti-bolt"></i><span class="right-nav-text"> Quiz </span></div>
                                    </a>
                                </li>
                                <li><br />
                                    <a href="seo_tools.php" class='active'>
                                        <div class="pull-left"><i class="ti-briefcase"></i><span class="right-nav-text"> SEO Tools </span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Left Sidebar End-->

                    <!--=================================Main content -->

                    <!--=================================
                   wrapper -->

                    <div class="content-wrapper"><br />
                    <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="mb-0"> Keyword Density Checker </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Keyword Density Checker</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
<div class="container main-container">
    <div class="row">
        <?php
        
        class html2text
{
    const ENCODING = 'UTF-8';
    protected $htmlFuncFlags;
    /**
     * Contains the HTML content to convert.
     *
     * @type string
     */
    protected $html;
    /**
     * Contains the converted, formatted text.
     *
     * @type string
     */
    protected $text;
    /**
     * List of preg* regular expression patterns to search for,
     * used in conjunction with $replace.
     *
     * @type array
     * @see $replace
     */
    protected $search = array(
        "/\r/",                                           // Non-legal carriage return
        "/[\n\t]+/",                                      // Newlines and tabs
        '/<head\b[^>]*>.*?<\/head>/i',                    // <head>
        '/<script\b[^>]*>.*?<\/script>/i',                // <script>s -- which strip_tags supposedly has problems with
        '/<style\b[^>]*>.*?<\/style>/i',                  // <style>s -- which strip_tags supposedly has problems with
        '/<i\b[^>]*>(.*?)<\/i>/i',                        // <i>
        '/<em\b[^>]*>(.*?)<\/em>/i',                      // <em>
        '/(<ul\b[^>]*>|<\/ul>)/i',                        // <ul> and </ul>
        '/(<ol\b[^>]*>|<\/ol>)/i',                        // <ol> and </ol>
        '/(<dl\b[^>]*>|<\/dl>)/i',                        // <dl> and </dl>
        '/<li\b[^>]*>(.*?)<\/li>/i',                      // <li> and </li>
        '/<dd\b[^>]*>(.*?)<\/dd>/i',                      // <dd> and </dd>
        '/<dt\b[^>]*>(.*?)<\/dt>/i',                      // <dt> and </dt>
        '/<li\b[^>]*>/i',                                 // <li>
        '/<hr\b[^>]*>/i',                                 // <hr>
        '/<div\b[^>]*>/i',                                // <div>
        '/(<table\b[^>]*>|<\/table>)/i',                  // <table> and </table>
        '/(<tr\b[^>]*>|<\/tr>)/i',                        // <tr> and </tr>
        '/<td\b[^>]*>(.*?)<\/td>/i',                      // <td> and </td>
        '/<span class="_html2text_ignore">.+?<\/span>/i', // <span class="_html2text_ignore">...</span>
        '/<(img)\b[^>]*alt=\"([^>"]+)\"[^>]*>/i',         // <img> with alt tag
    );
    /**
     * List of pattern replacements corresponding to patterns searched.
     *
     * @type array
     * @see $search
     */
    protected $replace = array(
        '',                              // Non-legal carriage return
        ' ',                             // Newlines and tabs
        '',                              // <head>
        '',                              // <script>s -- which strip_tags supposedly has problems with
        '',                              // <style>s -- which strip_tags supposedly has problems with
        '_\\1_',                         // <i>
        '_\\1_',                         // <em>
        "\n\n",                          // <ul> and </ul>
        "\n\n",                          // <ol> and </ol>
        "\n\n",                          // <dl> and </dl>
        "\t* \\1\n",                     // <li> and </li>
        " \\1\n",                        // <dd> and </dd>
        "\t* \\1",                       // <dt> and </dt>
        "\n\t* ",                        // <li>
        "\n-------------------------\n", // <hr>
        "<div>\n",                       // <div>
        "\n\n",                          // <table> and </table>
        "\n",                            // <tr> and </tr>
        "\t\t\\1\n",                     // <td> and </td>
        "",                              // <span class="_html2text_ignore">...</span>
        '[\\2]',                         // <img> with alt tag
    );
    /**
     * List of preg* regular expression patterns to search for,
     * used in conjunction with $entReplace.
     *
     * @type array
     * @see $entReplace
     */
    protected $entSearch = array(
        '/&#153;/i',                                     // TM symbol in win-1252
        '/&#151;/i',                                     // m-dash in win-1252
        '/&(amp|#38);/i',                                // Ampersand: see converter()
        '/[ ]{2,}/',                                     // Runs of spaces, post-handling
    );
    /**
     * List of pattern replacements corresponding to patterns searched.
     *
     * @type array
     * @see $entSearch
     */
    protected $entReplace = array(
        '™',         // TM symbol
        '—',         // m-dash
        '|+|amp|+|', // Ampersand: see converter()
        ' ',         // Runs of spaces, post-handling
    );
    /**
     * List of preg* regular expression patterns to search for
     * and replace using callback function.
     *
     * @type array
     */
    protected $callbackSearch = array(
        '/<(h)[123456]( [^>]*)?>(.*?)<\/h[123456]>/i',           // h1 - h6
        '/[ ]*<(p)( [^>]*)?>(.*?)<\/p>[ ]*/si',                  // <p> with surrounding whitespace.
        '/<(br)[^>]*>[ ]*/i',                                    // <br> with leading whitespace after the newline.
        '/<(b)( [^>]*)?>(.*?)<\/b>/i',                           // <b>
        '/<(strong)( [^>]*)?>(.*?)<\/strong>/i',                 // <strong>
        '/<(th)( [^>]*)?>(.*?)<\/th>/i',                         // <th> and </th>
        '/<(a) [^>]*href=("|\')([^"\']+)\2([^>]*)>(.*?)<\/a>/i'  // <a href="">
    );
    /**
     * List of preg* regular expression patterns to search for in PRE body,
     * used in conjunction with $preReplace.
     *
     * @type array
     * @see $preReplace
     */
    protected $preSearch = array(
        "/\n/",
        "/\t/",
        '/ /',
        '/<pre[^>]*>/',
        '/<\/pre>/'
    );
    /**
     * List of pattern replacements corresponding to patterns searched for PRE body.
     *
     * @type array
     * @see $preSearch
     */
    protected $preReplace = array(
        '<br>',
        '&nbsp;&nbsp;&nbsp;&nbsp;',
        '&nbsp;',
        '',
        '',
    );
    /**
     * Temporary workspace used during PRE processing.
     *
     * @type string
     */
    protected $preContent = '';
    /**
     * Contains the base URL that relative links should resolve to.
     *
     * @type string
     */
    protected $baseurl = '';
    /**
     * Indicates whether content in the $html variable has been converted yet.
     *
     * @type boolean
     * @see $html, $text
     */
    protected $converted = false;
    /**
     * Contains URL addresses from links to be rendered in plain text.
     *
     * @type array
     * @see buildlinkList()
     */
    protected $linkList = array();
    /**
     * Various configuration options (able to be set in the constructor)
     *
     * @type array
     */
    protected $options = array(
        'do_links' => 'inline', // 'none'
                                // 'inline' (show links inline)
                                // 'nextline' (show links on the next line)
                                // 'table' (if a table of link URLs should be listed after the text.
                                // 'bbcode' (show links as bbcode)
        'width' => 70,          //  Maximum width of the formatted text, in columns.
                                //  Set this value to 0 (or less) to ignore word wrapping
                                //  and not constrain text to a fixed-width column.
    );
    private function legacyConstruct($html = '', $fromFile = false, array $options = array())
    {
        $this->set_html($html, $fromFile);
        $this->options = array_merge($this->options, $options);
    }
    /**
     * @param string $html    Source HTML
     * @param array  $options Set configuration options
     */
    public function __construct($html = '', $options = array())
    {
        // for backwards compatibility
        if (!is_array($options)) {
            return call_user_func_array(array($this, 'legacyConstruct'), func_get_args());
        }
        $this->html = $html;
        $this->options = array_merge($this->options, $options);
        $this->htmlFuncFlags = (PHP_VERSION_ID < 50400)
            ? ENT_COMPAT
            : ENT_COMPAT | ENT_HTML5;
    }
    /**
     * Set the source HTML
     *
     * @param string $html HTML source content
     */
    public function setHtml($html)
    {
        $this->html = $html;
        $this->converted = false;
    }
    /**
     * @deprecated
     */
    public function set_html($html, $from_file = false)
    {
        if ($from_file) {
            throw new \InvalidArgumentException("Argument from_file no longer supported");
        }
        return $this->setHtml($html);
    }
    /**
     * Returns the text, converted from HTML.
     *
     * @return string
     */
    public function getText()
    {
        if (!$this->converted) {
            $this->convert();
        }
        return $this->text;
    }
    /**
     * @deprecated
     */
    public function get_text()
    {
        return $this->getText();
    }
    /**
     * @deprecated
     */
    public function print_text()
    {
        print $this->getText();
    }
    /**
     * @deprecated
     */
    public function p()
    {
        return $this->print_text();
    }
    /**
     * Sets a base URL to handle relative links.
     *
     * @param string $baseurl
     */
    public function setBaseUrl($baseurl)
    {
        $this->baseurl = $baseurl;
    }
    /**
     * @deprecated
     */
    public function set_base_url($baseurl)
    {
        return $this->setBaseUrl($baseurl);
    }
    protected function convert()
    {
       $origEncoding = mb_internal_encoding();
       mb_internal_encoding(self::ENCODING);
       $this->doConvert();
       mb_internal_encoding($origEncoding);
    }
    protected function doConvert()
    {
        $this->linkList = array();
        $text = trim($this->html);
        $this->converter($text);
        if ($this->linkList) {
            $text .= "\n\nLinks:\n------\n";
            foreach ($this->linkList as $i => $url) {
                $text .= '[' . ($i + 1) . '] ' . $url . "\n";
            }
        }
        $this->text = $text;
        $this->converted = true;
    }
    protected function converter(&$text)
    {
        $this->convertBlockquotes($text);
        $this->convertPre($text);
        $text = preg_replace($this->search, $this->replace, $text);
        $text = preg_replace_callback($this->callbackSearch, array($this, 'pregCallback'), $text);
        $text = strip_tags($text);
        $text = preg_replace($this->entSearch, $this->entReplace, $text);
        $text = html_entity_decode($text, $this->htmlFuncFlags, self::ENCODING);
        // Remove unknown/unhandled entities (this cannot be done in search-and-replace block)
        $text = preg_replace('/&([a-zA-Z0-9]{2,6}|#[0-9]{2,4});/', '', $text);
        // Convert "|+|amp|+|" into "&", need to be done after handling of unknown entities
        // This properly handles situation of "&amp;quot;" in input string
        $text = str_replace('|+|amp|+|', '&', $text);
        // Normalise empty lines
        $text = preg_replace("/\n\s+\n/", "\n\n", $text);
        $text = preg_replace("/[\n]{3,}/", "\n\n", $text);
        // remove leading empty lines (can be produced by eg. P tag on the beginning)
        $text = ltrim($text, "\n");
        if ($this->options['width'] > 0) {
            $text = wordwrap($text, $this->options['width']);
        }
    }
    /**
     * Helper function called by preg_replace() on link replacement.
     *
     * Maintains an internal list of links to be displayed at the end of the
     * text, with numeric indices to the original point in the text they
     * appeared. Also makes an effort at identifying and handling absolute
     * and relative links.
     *
     * @param  string $link          URL of the link
     * @param  string $display       Part of the text to associate number with
     * @param  null   $linkOverride
     * @return string
     */
    protected function buildlinkList($link, $display, $linkOverride = null)
    {
        $linkMethod = ($linkOverride) ? $linkOverride : $this->options['do_links'];
        if ($linkMethod == 'none') {
            return $display;
        }
        // Ignored link types
        if (preg_match('!^(javascript:|mailto:|#)!i', $link)) {
            return $display;
        }
        if (preg_match('!^([a-z][a-z0-9.+-]+:)!i', $link)) {
            $url = $link;
        } else {
            $url = $this->baseurl;
            if (mb_substr($link, 0, 1) != '/') {
                $url .= '/';
            }
            $url .= $link;
        }
        if ($linkMethod == 'table') {
            if (($index = array_search($url, $this->linkList)) === false) {
                $index = count($this->linkList);
                $this->linkList[] = $url;
            }
            return $display . ' [' . ($index + 1) . ']';
        } elseif ($linkMethod == 'nextline') {
            return $display . "\n[" . $url . ']';
        } elseif ($linkMethod == 'bbcode') {
            return sprintf('[url=%s]%s[/url]', $url, $display);
        } else { // link_method defaults to inline
            return $display . ' [' . $url . ']';
        }
    }
    protected function convertPre(&$text)
    {
        // get the content of PRE element
        while (preg_match('/<pre[^>]*>(.*)<\/pre>/ismU', $text, $matches)) {
            // Replace br tags with newlines to prevent the search-and-replace callback from killing whitespace
            $this->preContent = preg_replace('/(<br\b[^>]*>)/i', "\n", $matches[1]);
            // Run our defined tags search-and-replace with callback
            $this->preContent = preg_replace_callback(
                $this->callbackSearch,
                array($this, 'pregCallback'),
                $this->preContent
            );
            // convert the content
            $this->preContent = sprintf(
                '<div><br>%s<br></div>',
                preg_replace($this->preSearch, $this->preReplace, $this->preContent)
            );
            // replace the content (use callback because content can contain $0 variable)
            $text = preg_replace_callback(
                '/<pre[^>]*>.*<\/pre>/ismU',
                array($this, 'pregPreCallback'),
                $text,
                1
            );
            // free memory
            $this->preContent = '';
        }
    }
    /**
     * Helper function for BLOCKQUOTE body conversion.
     *
     * @param string $text HTML content
     */
    protected function convertBlockquotes(&$text)
    {
        if (preg_match_all('/<\/*blockquote[^>]*>/i', $text, $matches, PREG_OFFSET_CAPTURE)) {
            $originalText = $text;
            $start = 0;
            $taglen = 0;
            $level = 0;
            $diff = 0;
            foreach ($matches[0] as $m) {
                $m[1] = mb_strlen(substr($originalText, 0, $m[1]));
                if ($m[0][0] == '<' && $m[0][1] == '/') {
                    $level--;
                    if ($level < 0) {
                        $level = 0; // malformed HTML: go to next blockquote
                    } elseif ($level > 0) {
                        // skip inner blockquote
                    } else {
                        $end = $m[1];
                        $len = $end - $taglen - $start;
                        // Get blockquote content
                        $body = mb_substr($text, $start + $taglen - $diff, $len);
                        // Set text width
                        $pWidth = $this->options['width'];
                        if ($this->options['width'] > 0) $this->options['width'] -= 2;
                        // Convert blockquote content
                        $body = trim($body);
                        $this->converter($body);
                        // Add citation markers and create PRE block
                        $body = preg_replace('/((^|\n)>*)/', '\\1> ', trim($body));
                        $body = '<pre>' . htmlspecialchars($body, $this->htmlFuncFlags, self::ENCODING) . '</pre>';
                        // Re-set text width
                        $this->options['width'] = $pWidth;
                        // Replace content
                        $text = mb_substr($text, 0, $start - $diff)
                            . $body
                            . mb_substr($text, $end + mb_strlen($m[0]) - $diff);
                        $diff += $len + $taglen + mb_strlen($m[0]) - mb_strlen($body);
                        unset($body);
                    }
                } else {
                    if ($level == 0) {
                        $start = $m[1];
                        $taglen = mb_strlen($m[0]);
                    }
                    $level++;
                }
            }
        }
    }
    /**
     * Callback function for preg_replace_callback use.
     *
     * @param  array  $matches PREG matches
     * @return string
     */
    protected function pregCallback($matches)
    {
        switch (mb_strtolower($matches[1])) {
            case 'p':
                // Replace newlines with spaces.
                $para = str_replace("\n", " ", $matches[3]);
                // Trim trailing and leading whitespace within the tag.
                $para = trim($para);
                // Add trailing newlines for this para.
                return "\n" . $para . "\n";
            case 'br':
                return "\n";
            case 'b':
            case 'strong':
                return $this->toupper($matches[3]);
            case 'th':
                return $this->toupper("\t\t" . $matches[3] . "\n");
            case 'h':
                return $this->toupper("\n\n" . $matches[3] . "\n\n");
            case 'a':
                // override the link method
                $linkOverride = null;
                if (preg_match('/_html2text_link_(\w+)/', $matches[4], $linkOverrideMatch)) {
                    $linkOverride = $linkOverrideMatch[1];
                }
                // Remove spaces in URL (#1487805)
                $url = str_replace(' ', '', $matches[3]);
                return $this->buildlinkList($url, $matches[5], $linkOverride);
        }
        return '';
    }
    /**
     * Callback function for preg_replace_callback use in PRE content handler.
     *
     * @param  array  $matches PREG matches
     * @return string
     */
    protected function pregPreCallback(/** @noinspection PhpUnusedParameterInspection */ $matches)
    {
        return $this->preContent;
    }
    /**
     * Strtoupper function with HTML tags and entities handling.
     *
     * @param  string $str Text to convert
     * @return string Converted text
     */
    protected function toupper($str)
    {
        // string can contain HTML tags
        $chunks = preg_split('/(<[^>]*>)/', $str, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        // convert toupper only the text between HTML tags
        foreach ($chunks as $i => $chunk) {
            if ($chunk[0] != '<') {
                $chunks[$i] = $this->strtoupper($chunk);
            }
        }
        return implode($chunks);
    }
    /**
     * Strtoupper multibyte wrapper function with HTML entities handling.
     *
     * @param  string $str Text to convert
     * @return string Converted text
     */
    protected function strtoupper($str)
    {
        $str = html_entity_decode($str, $this->htmlFuncFlags, self::ENCODING);
        $str = mb_strtoupper($str);
        $str = htmlspecialchars($str, $this->htmlFuncFlags, self::ENCODING);
        return $str;
    }
}

/*
 ======================================================================
 KeywordDensityChecker v1.1
 
 Simple yet powerfull PHP class to get the keyword density of
 a website.
 
 by Stephan Schmitz, info@eyecatch-up.de
 
 Latest version, features, manual and examples:
     http://code.eyecatch-up.de/?p=155
 ----------------------------------------------------------------------
 LICENSE

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 To read the license please visit http://www.gnu.org/copyleft/gpl.html
 ======================================================================
*/

/**
* KeywordDensityChecker
* Simple yet powerfull PHP class to get the keyword density of
* a website.
*/
class KD {
// -------------------------------------------------------------------
// @params
// -------------------------------------------------------------------
    var $domain;              // Domain to check
    var $domainData = '';
// -------------------------------------------------------------------
// PRIVATE FUNCTIONS
// -------------------------------------------------------------------
    // -------------------------------------------------------------------
    // Private Function cURL
    // -------------------------------------------------------------------
    private function cURL(){
      // -------------------------------------------------------------------
      // Save result page to string using curl
      // -------------------------------------------------------------------
      //$ch = curl_init();
      //curl_setopt($ch,CURLOPT_URL,$this->domain);
      //curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
      $str = curlGET($this->domain);
      return $str;   
    } // End of private function cURL
    // -------------------------------------------------------------------
    // Private Function to return result page as string
    // -------------------------------------------------------------------
    private function plainText(){
      // -------------------------------------------------------------------
      // External classes
      // -------------------------------------------------------------------
      //require_once('ext/class.html2text.inc');
      // -------------------------------------------------------------------
      // Save google result page to string using curl
      // -------------------------------------------------------------------
      if($this->domainData == '')
         $str = $this->cURL();
      else
         $str = $this->domainData;
      //file_put_contents('test.txt',$str);
      // -------------------------------------------------------------------
      // Extract the plain text
      // -------------------------------------------------------------------
      $extraction = new html2text($str);
      $extraction->set_base_url($this->domain);
      // -------------------------------------------------------------------
      // Return string
      // -------------------------------------------------------------------
      return strtolower($extraction->get_text());  
    } // End of private function plainText
    // -------------------------------------------------------------------
    // Private Function to clean out the plain text
    // -------------------------------------------------------------------
    private function trim_replace($string) {
      $string = trim($string);
      return (string)str_replace(array("\r", "\r\n", "\n"), '', $string);
    }
    // -------------------------------------------------------------------
    // Private Function to calculate the keyword density from plain text
    // -------------------------------------------------------------------
    private function calcDensity(){   
      // -------------------------------------------------------------------
      // Prepare string
      // -------------------------------------------------------------------
      $words = explode(" ",$this->plainText());   
      $common_words = "i,he,she,it,and,me,my,you,the"; 
      $common_words = strtolower($common_words);
      $common_words = explode(",", $common_words);
      // -------------------------------------------------------------------
      // Get keywords
      // -------------------------------------------------------------------      
      $words_sum = 0;     
      foreach ($words as $value){
        $common = false;
        $value = $this->trim_replace($value);
        if (strlen($value) > 3){
          foreach ($common_words as $common_word){
            if ($common_word == $value){
              $common = true;
            }
          }
          if ($common != true){
            if (!preg_match("/http/i", $value) && !preg_match("/mailto:/i", $value)) {
              $keywords[] = $value;
              $words_sum++;
            }
          }
        }
      }    
      // -------------------------------------------------------------------
      // Do some maths and write array
      // ------------------------------------------------------------------- 
      $keywords = array_count_values($keywords);
      arsort($keywords);
      $results = array();
		  $results []= array(
		          'total words' => $words_sum
      );
      foreach ($keywords as $key => $value){
            $percent = 100 / $words_sum * $value;
		        $results []= array(
                    'keyword' => trim($key),
		                'count' => $value,
		                'percent' => round($percent, 2)
            );
      }
      // -------------------------------------------------------------------
      // Return array
      // -------------------------------------------------------------------
      return $results; 
    } // End of private function calcDensity
// -------------------------------------------------------------------
// PUBLIC FUNCTION
// -------------------------------------------------------------------
    // -------------------------------------------------------------------
    // Public Function to return the keyword density result array
    // -------------------------------------------------------------------
    public function result(){    
      return $this->calcDensity();      
    } // End of function KD
}
        
        include 'functions/functions.php';
        if (isset($_POST['submit'])) {
            $my_url = 'http://' . clean_with_www(raino_trim($_POST['url']));
            if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
                $error = 'Error';
            } else {
                $regUserInput = $my_url;
                $obj = new KD();
                $obj->domain = $my_url;
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
                    $error = $lang['183'];
                }
                $myUrl = ucfirst(str_replace('www.', '', $my_url));
            }
        }


//        if ($themeOptions['general']['sidebar'] == 'left')
//            require_once(THEME_DIR . "sidebar.php");
        ?>
        <div class="col-md-10 main-index">

            <div class="xd_top_box">
<?php //echo $ads_720x90; ?>
            </div>

            <h2 id="title"><?php //echo $data['tool_name']; ?></h2>

<?php //if ($pointOut != 'output') { ?>
                <br />
                <p><?php //echo $lang['23']; ?>
                </p>
                <form method="POST" action="" onsubmit="return fixURL();"> 
                    <input type="text" name="url" id="url" value="" class="form-control" placeholder='Enter URL here' required autofocus/>
                    <br />
    <?php //if ($toolCap) echo $captchaCode; ?>
                    <div>
                        <input class="btn btn-info" type="submit" value="Submit" name="submit"/>
                    </div>
                </form>     

    <?php
//} else {
    //Output Block
    //if (isset($error)) {

        //echo '<br/><br/><div class="alert alert-error">
            //<strong>Alert!</strong> ' . $error . '
            //</div><br/><br/>
            //<div class="text-center"><a class="btn btn-info" href="' . $toolURL . '">' . $lang['12'] . '</a>
            //</div><br/>';
    //} else {
        
        if(isset($_POST['submit'])) {
        ?>
                    <br />
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td><?php echo 'URL:'; ?> </td>
                                <td><strong> <?php echo $my_url; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?php echo 'Total Keywords:'; ?> </td>
                                <td><strong> <?php echo $outCount; ?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                        <th><?php echo 'Keywords'; ?></th>
                        <th><?php echo 'Count'; ?></th>
                        <th><?php echo 'Percentage'; ?></th>
                        </thead>

                        <tbody>
        <?php foreach ($outArr as $outVal) { ?>
                                <tr>
                                    <td><strong><?php echo $outVal[0]; ?></strong></td>
                                    <td><?php echo $outVal[1]; ?></td>
                                    <td><?php echo $outVal[2]; ?>%</td>
                                </tr>
        <?php } ?>
                        </tbody>
                    </table>


    <?php }
//} ?>

            <br />

            <div class="xd_top_box">
<?php //echo $ads_720x90; ?>
            </div>

            <h2 id="sec1" class="about_tool"><?php //echo $lang['11'] . ' ' . $data['tool_name']; ?></h2>
            <p>
<?php //echo $data['about_tool']; ?>
            </p> <br />
        </div>              

<?php
//if ($themeOptions['general']['sidebar'] == 'right')
//    require_once(THEME_DIR . "sidebar.php");
?>       		
    </div>
</div> <br />
                        </div>
                        <br /><br />
                        <!-- footer -->

                        <footer class="bg-white p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center text-md-left">
                                        <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-center text-md-right">
                                        <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                        <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                        <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div> 
                </div>
            </div>
        </div>

        <!--=================================
         footer -->



        <!--=================================
         jquery -->

        <!-- jquery -->
        <script src="js/jquery-3.3.1.min.js"></script>

        <!-- plugins-jquery -->
        <script src="js/plugins-jquery.js"></script>

        <!-- plugin_path -->
        <script>var plugin_path = 'js/';</script>

        <!-- chart -->
        <script src="js/chart-init.js"></script>

        <!-- calendar -->
        <script src="js/calendar.init.js"></script>

        <!-- charts sparkline -->
        <script src="js/sparkline.init.js"></script>

        <!-- charts morris -->
        <script src="js/morris.init.js"></script>

        <!-- datepicker -->
        <script src="js/datepicker.js"></script>

        <!-- sweetalert2 -->
        <script src="js/sweetalert2.js"></script>

        <!-- toastr -->
        <script src="js/toastr.js"></script>

        <!-- validation -->
        <script src="js/validation.js"></script>

        <!-- lobilist -->
        <script src="js/lobilist.js"></script>

        <!-- custom -->
        <script src="js/custom.js"></script>

    </body>
</html>