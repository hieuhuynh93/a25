
<?php
require_once 'simple_dom.php';
require_once 'all_functions.php';

$htmlResult = '';
$htmlBasicInfo = '';
?>
<br/>
<?php
$host = '';
if (isset($_REQUEST['url'])) {
    $host = $_REQUEST['url'];
    $alexa_data_full = alexa_raw_data(clean_url($_REQUEST['url']));

    //Output Variables Start

    $global_rank = $alexa_data_full["global_rank"];
    $country_rank = $alexa_data_full["country_rank"];
    $country = $alexa_data_full["country"];
    $traffic_rank_graph = $alexa_data_full["traffic_rank_graph"];
    $country_name = $alexa_data_full["country_name"];
    $country_percent_visitor = $alexa_data_full["country_percent_visitor"];
    $country_in_rank = $alexa_data_full["country_in_rank"];
    $bounce_rate = $alexa_data_full["bounce_rate"];
    $page_view_per_visitor = $alexa_data_full["page_view_per_visitor"];
    $daily_time_on_the_site = $alexa_data_full["daily_time_on_the_site"];
    $visitor_percent_from_searchengine = $alexa_data_full["visitor_percent_from_searchengine"];
    $search_engine_percentage_graph = $alexa_data_full["search_engine_percentage_graph"];
    $keyword_name = $alexa_data_full["keyword_name"];
    $keyword_percent_of_search_traffic = $alexa_data_full["keyword_percent_of_search_traffic"];
    $upstream_site_name = $alexa_data_full["upstream_site_name"];
    $upstream_percent_unique_visits = $alexa_data_full["upstream_percent_unique_visits"];
    $total_site_linking_in = $alexa_data_full["total_site_linking_in"];
    $linking_in_site_name = $alexa_data_full["linking_in_site_name"];
    $linking_in_site_address = $alexa_data_full["linking_in_site_address"];
    $subdomain_name = $alexa_data_full["subdomain_name"];
    $subdomain_percent_visitors = $alexa_data_full["subdomain_percent_visitors"];
    $status = $alexa_data_full["status"];

    $htmlBasicInfo = '<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-warning">
                            <i style="font-size: 40px; color: #28a745;" class="fa fa-check-square-o highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Domain Name</p>
                        <b>' . $host . '</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-success">
                            <i style="font-size: 40px; color: #28a745;" class="fa fa-check-square-o highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Global Rank</p>
                        <h5>' . $global_rank . '</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="round-chart mb-0" data-percent="80" data-size="80" data-color="#28a745">
                            <span class="percent"></span>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Country Rank (' . $country . ')</p>
                        <h5>' . $country_rank . '</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

    $htmlResult .= $htmlBasicInfo;

    $htmlCountryRank = '';
    $sl = 0;
    if (is_array($country_name) && is_array($country_in_rank) && is_array($country_percent_visitor)) {
        foreach ($country_name as $key => $val) {
            $sl++;
            if (array_key_exists($key, $country_name) && array_key_exists($key, $country_in_rank) && array_key_exists($key, $country_percent_visitor)) {
                $htmlCountryRank .= '<tr><td>' . $sl . '</td><td>' . $country_name[$key] . '</td><td>' . $country_percent_visitor[$key] . '</td><td>' . $country_in_rank[$key] . '</td></tr>';
            }
        }
    } else {
        $htmlCountryRank = "<tr><td colspan='4'>No data found!</td></tr>";
    }
    $htmlGraphAndCountryRank = '<div class="row" style="padding-top: 25px;">
    <div class="col-xl-6 mb-30">
        <div class="card card-statistics">
            <div class="card-body">
                <h5 class="card-title pb-0 border-0 mb-15">Alexa Traffic Ranks </h5>
                <div class="box-body chart-responsive">
                    <img src="' . $traffic_rank_graph . '" alt="Graph not found!" class="img-responsive" style="width:100%">
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 mb-30">
        <div class="card card-statistics">
            <div class="card-body">
                <h5 class="card-title pb-0 border-0 mb-15">Visitors per Country </h5>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Percent of Visitors</th>
                                <th>Rank in Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            ' . $htmlCountryRank . '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br>';
    $htmlResult .= $htmlGraphAndCountryRank;

    $htmlVisitor = '<div class="row" style="padding-top: 25px;">
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-danger">
                            <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Daily Page View per Visitor</p>
                        <h4>' . $page_view_per_visitor . '</h4>
                    </div>
                </div>
                <div class="progress">
                    <div style="width: ' . (round($page_view_per_visitor) * 10) . '%" class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-warning">
                            <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Daily Time on Site</p>
                        <h4>' . $daily_time_on_the_site . '</h4>
                    </div>
                </div>
                <div class="progress">
                    <div style="width: ' . (round($daily_time_on_the_site) * 10) . '" class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-success">
                            <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">Visitor % from Search Engines</p>
                        <h4>' . $visitor_percent_from_searchengine . '</h4>
                    </div>
                </div>
                <div class="progress">
                    <div style="width: ' . ($visitor_percent_from_searchengine) . '" class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
</div><br>';

    $htmlResult .= $htmlVisitor;

    $htmlKFSERows = '';
    if (is_array($keyword_name) && is_array($keyword_percent_of_search_traffic)) {
        foreach ($keyword_name as $key => $val) {
            if (array_key_exists($key, $keyword_name) && array_key_exists($key, $keyword_percent_of_search_traffic)) {
                $htmlKFSERows .= '<li class="mb-20">
                                    <div class="media">
                                        <div class="position-relative" style="padding-right:15px;padding-top: 5px;">
                                            <i class="fa fa-check-square-o" style="font-size:20px"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">' . $keyword_name[$key] . '  <span class="float-right text-danger"> ' . $keyword_percent_of_search_traffic[$key] . '% </span>  </h6>
                                            <div class="progress">
                                                <div style="width: ' . $keyword_percent_of_search_traffic[$key] . ';" class="progress-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>';
            }
        }
    }

    $htmlKSEG = '<div class="row">
                    <div class="col-xl-7 mt-4 mt-xl-0">
                        <h5 class="card-title">Top Keywords from Search Engines</h5>
                        <ul class="list-unstyled">
                            ' . $htmlKFSERows . '
                        </ul>
                    </div>
                    <div class="col-xl-5 mt-4 mt-xl-0">
                        <div class="claerfix">
                            <h5 class="card-title">Search Traffic</h5>
                        </div>
                        <div class="box-body chart-responsive">
                            <img src="' . $search_engine_percentage_graph . '" alt="Graph not found!" class="img-responsive" style="width:100%">
                        </div>
                    </div>
                </div>';

    $htmlResult .= $htmlKSEG;

    $htmlLinking = '<div class="row" style="padding:15px;">
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-danger">
                                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">Total Linking In Site</p>
                                            <h4>' . $total_site_linking_in . '</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-danger">
                                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">Bounce Rate</p>
                                            <h4>' . $bounce_rate . '</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

    $htmlResult .= $htmlLinking;

    $sl = 0;
    $htmlLinkingtrData = '';
    if (is_array($linking_in_site_name) && is_array($linking_in_site_address)) {
        foreach ($linking_in_site_name as $key => $val) {
            $sl++;
            if (array_key_exists($key, $linking_in_site_name) && array_key_exists($key, $linking_in_site_address)) {
                $htmlLinkingtrData .= '<tr><td>' . $sl . '</td><td>' . $linking_in_site_name[$key] . '</td><td>' . $linking_in_site_address[$key] . '</td></tr>';
            }
        }
    }
    $htmlLinkingStatictics = '';
    $htmlLinkingStatictics .= '<div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 class="card-title">Linking In Statistics</h5>
                    <div class="table-responsive">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>Site</th>
                                    <th>Page</th>
                                </tr>
                            </thead>
                            <tbody>
                                ' . $htmlLinkingtrData . '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    $htmlResult .= $htmlLinkingStatictics;

    $SubdomainStatistics = '';
    $htmlUS = '';
    $htmlSSUD = '';

    if (is_array($subdomain_name) && is_array($subdomain_percent_visitors)) {
        foreach ($subdomain_name as $key => $val) {
            if (array_key_exists($key, $subdomain_name) && array_key_exists($key, $subdomain_percent_visitors)) {
                $SubdomainStatistics .= $subdomain_name[$key] . '<span class="pull-right">Visitor: <b>' . $subdomain_percent_visitors[$key] . '</b></span><div class="progress"><div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="' . $subdomain_percent_visitors[$key] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $subdomain_percent_visitors[$key] . '"></div></div>';
            }
        }
    }

    if (is_array($upstream_site_name) && is_array($upstream_percent_unique_visits)) {
        foreach ($upstream_site_name as $key => $val) {
            if (array_key_exists($key, $upstream_site_name) && array_key_exists($key, $upstream_percent_unique_visits)) {
                $htmlUS .= $upstream_site_name[$key] . '<span class="pull-right">Unique Visit: <b>' . $upstream_percent_unique_visits[$key] . '</b></span><div class="progress"><div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="' . $upstream_percent_unique_visits[$key] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $upstream_percent_unique_visits[$key] . '"></div></div>';
            }
        }
    }

    $htmlSSUD .= '<div class="row" style="padding-top:20px;">
                <div class="col-xl-8 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title">Upstream Sites</h5>
                            ' . $htmlUS . '
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="mb-15 card-title pb-0 border-0">Subdomain Statistics </h5>
                            ' . $SubdomainStatistics . '
                        </div>
                    </div>
                </div>
            </div>';
    $htmlResult .= $htmlSSUD;
}
echo $htmlResult; //json_encode(array('htmlAlexaInfo' => $htmlResult));
?>
