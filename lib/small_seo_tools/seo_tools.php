<?php
error_reporting(0);

require_once 'simple_html_dom.php';
require_once 'all_functions.php';

ini_set('max_execution_time', 600);
?>
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="css/style.css" />

<style>
    .mb-30 {
        margin-bottom: 1.143rem !important;
    }
    .xyz {
        display:block;
        overflow-y:scroll;
        max-height:550px;
        width:100%;
    }

    .card:hover{
            text-shadow: 0px 1px 0px #666;
            border: solid 2px #ccc; 
            border-radius: 20px;
            box-shadow: 2px 3px 5px #aaaaaa;
        }

    .card {
        /*border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
        text-shadow: 0px 1px 0px #666;
            border: solid 2px #ccc; 
            border-radius: 20px;
    }
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

<div class="wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">
                        <div class="file-box hover">
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/article_rewriter.png" alt="">
                                    <h6 id='article'><a href='article_rewriter.php'><b><small> Article Rewriter </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/word_counter.png" alt="">
                                    <h6 id='word'><a href='word_counter.php'><b><small> Word Counter </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/backlink_maker.png" alt="">
                                    <h6 id='backlink'><a href='backlink_maker.php'><b><small> Backlink Maker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/denied.png" alt="">
                                    <h6 id='blacklist'><a href='builtwith.php'><b><small> BuiltWith Technologies </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div> 
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/keyword_density_checker.png" alt="">
                                    <h6 id='keyword'><a href='keyword_density_checker.php'><b><small> Keyword Density Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/google_malware.png" alt="">
                                    <h6 id='malware'><a href='google_malware_checker.php'><b><small> Google Malware Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/denied.png" alt="">
                                    <h6 id='blacklist'><a href='blacklist_lookup.php'><b><small> Blacklist Lookup Tool </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/avg_antivirus.png" alt="">
                                    <h6 id='suspicious'><a href='suspicious_domain_checker.php'><b><small> Suspicious Domain Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/link_price_calculator.png" alt="">
                                    <h6 id='price'><a href='link_price_calculator.php'><b><small> Link Price Calculator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/links_count_checker.png" alt="">
                                    <h6 id='count'> <a href='links_counter.php'><b><small> Website Links Count Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/source_code.png" alt="">
                                    <h6 id='source'><a href='get_source_code.php'><b><small> Get Source Code Of Webpage </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/broken_links.png" alt="">
                                    <h6 id='broken'><a href='broken_links_finder.php'><b><small> Broken Links Finder </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/keywords_suggestion.png" alt="">
                                    <h6 id='suggestion'><a href='keyword_suggestion.php'><b><small> Keywords Suggestion Tool </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/meta_tags_analyzer.png" alt="">
                                    <h6 id='meta'><a href='meta_tag_analyzer.php'><b><small> Meta Tags Analyzer </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/class_c_ip.png" alt="">
                                    <h6 id='meta'><a href='class_c_ip.php'><b><small> Class C IP Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/alexa.png" alt="">
                                    <h6 id='meta'><a href='alexa_info.php'><b><small> Alexa Information Fetcher </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/domain_into_IP.png" alt="">
                                    <h6 id='meta'><a href='domain_to_ip.php'><b><small> Domain Into IP Converter </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/keyword_density_checker.png" alt="">
                                    <h6 id='meta'><a href='keyword_analysis.php'><b><small> Keyword Analyzer </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/link_analyzer.png" alt="">
                                    <h6 id='meta'><a href='link_analyzer.php'><b><small> Link Analyzer </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/reverse_ip_domain.png" alt="">
                                    <h6 id='meta'><a href='reverse_ip.php'><b><small> Reverse IP Domain Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/server_status_checker.png" alt="">
                                    <h6 id='meta'><a href='server_or_url_status.php'><b><small> Server Status Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/www_redirect_checker.png" alt="">
                                    <h6 id='meta'><a href='redirect_checker.php'><b><small> Website Redirect Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/url_encoder_decoder.png" alt="">
                                    <h6 id='meta'><a href='url_encoder.php'><b><small> URL Encoder / Decoder </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/page_authority.png" alt="">
                                    <h6 id='meta'><a href='website_description.php'><b><small> Website Description Fetcher </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/meta_tag_generator.png" alt="">
                                    <h6 id='meta'><a href='meta_tag_generator.php'><b><small> Meta Tag Generator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/whois_checker.png" alt="">
                                    <h6 id='meta'><a href='whois_checker.php'><b><small> WHOIS Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/url_rewriting.png" alt="">
                                    <h6 id='meta'><a href='url_rewrite.php'><b><small> URL Rewriting Tool </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/sitemap.png" alt="">
                                    <h6 id='meta'><a href='xml_sitemap.php'><b><small> Ultimate XML SiteMap Generator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/alexa.png" alt="">
                                    <h6 id='meta'><a href='alexa_rank.php'><b><small> Alexa Rank Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/online_md5_generator.png" alt="">
                                    <h6 id='meta'><a href='online_md5.php'><b><small> Online MD5 Generator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/page_speed.png" alt="">
                                    <h6 id='meta'><a href='pagespeed_check.php'><b><small> Page Speed Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/code_to_text.png" alt="">
                                    <h6 id='meta'><a href='code_text_ratio.php'><b><small> Code to Text Ratio Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/dns.png" alt="">
                                    <h6 id='meta'><a href='dns_checker.php'><b><small> Find DNS Records </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/what_is_my_browser.png" alt="">
                                    <h6 id='meta'><a href='my_browser.php'><b><small> What Is My Browser </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/email_privacy.png" alt="">
                                    <h6 id='meta'><a href='email_privacy.php'><b><small> E-mail Privacy </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/spider_simulator.png" alt="">
                                    <h6 id='meta'><a href='spider.php'><b><small> Search Engine Spider Simulator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/robots_txt_generator.png" alt="">
                                    <h6 id='meta'><a href='robots.php'><b><small> Robots.txt Generator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/domain_age_checker.png" alt="">
                                    <h6 id='meta'><a href='domain_age.php'><b><small> Domain Age Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/my_IP_address.png" alt="">
                                    <h6 id='meta'><a href='my_ip_address.php'><b><small> My IP Address </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/my_IP_address.png" alt="">
                                    <h6 id='meta'><a href='domain_ip_address.php'><b><small> Domain IP Address </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/page_size_checker.png" alt="">
                                    <h6 id='meta'><a href='page_size.php'><b><small> Page Size Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/domain_hosting_checker.png" alt="">
                                    <h6 id='meta'><a href='domain_hosting.php'><b><small> Domain Hosting Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/google_index_checker.png" alt="">
                                    <h6 id='meta'><a href='google_index.php'><b><small> Google Index Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/webpage_screen_resolution_simulator.png" alt="">
                                    <h6 id='meta'><a href='screen_simulator.php'><b><small> Webpage Screen Resolution Simulator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/google_pagespeed.png" alt="">
                                    <h6 id='meta'><a href='google_data.php'><b><small> Google PageSpeed Insights Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/site_info(1).png" alt="">
                                    <h6 id='meta'><a href='site_info.php'><b><small> Website Information </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/keyword_position_checker.png" alt="">
                                    <h6 id='meta'><a href='keyword_position.php'><b><small> Keyword Position Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/rsz_website_score.png" alt="">
                                    <h6 id='meta'><a href='website_score.php'><b><small> Website Score Calculator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/plagiarism_checker.png" alt="">
                                    <h6 id='meta'><a href='website_test.php'><b><small> Website Test Results </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/rsz_traffic_estimate.png" alt="">
                                    <h6 id='meta'><a href='traffic_estimation.php'><b><small> Estimation Traffic & Earnings </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/moz.png" alt="">
                                    <h6 id='meta'><a href='moz_rank.php'><b><small> MozRank Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/website_screenshot_generator.png" alt="">
                                    <h6 id='meta'><a href='website_screenshot.php'><b><small> Website Screenshot Generator </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/google_cache.png" alt="">
                                    <h6 id='meta'><a href='google_cache.php'><b><small> Google Cache Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/domain_authority.png" alt="">
                                    <h6 id='meta'><a href='da.php'><b><small> Domain Authority Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/page_authority.png" alt="">
                                    <h6 id='meta'><a href='pa.php'><b><small> Page Authority Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/header.png" alt="">
                                    <h6 id='meta'><a href='headers_response.php'><b><small> Response from Headers </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/server (2).png" alt="">
                                    <h6 id='meta'><a href='server_response.php'><b><small> Response from Server </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/dm_sugg.png" alt="">
                                    <h6 id='meta'><a href='suggestions.php'><b><small> Desktop & Mobile Suggestions </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/speed_tips.png" alt="">
                                    <h6 id='meta'><a href='optimization.php'><b><small> Speed & Optimization Tips </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/speed_tips.png" alt="">
                                    <h6 id='meta'><a href='ipv6_check.php'><b><small> IPv6 Compatibility Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/speed_tips.png" alt="">
                                    <h6 id='meta'><a href='ip_canonical.php'><b><small> IP Canonicalization Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/speed_tips.png" alt="">
                                    <h6 id='meta'><a href='page_status.php'><b><small> Page Status Checker </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-3 mb-30 text-center">     
                <div class="card card-statistics h-100"> 
                    <div class="card-body">   
                        <div class="file-box hover">   
                            <div class="d-block">
                                <div class="d-block">
                                    <img class="img-fluid mb-20" src="images/speed_tips.png" alt="">
                                    <h6 id='meta'><a href='virus_total.php'><b><small> VirusTotal Scanner </small></b></a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
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
