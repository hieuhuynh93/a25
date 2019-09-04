<?php
require_once 'simple_html_dom.php';
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $keyword = content_analysis($_REQUEST['url']);
    $result['one_phrase'] = json_encode($keyword['one_phrase']);
    $result['two_phrase'] = json_encode($keyword['two_phrase']);
    $result['three_phrase'] = json_encode($keyword['three_phrase']);
    $result['four_phrase'] = json_encode($keyword['four_phrase']);
    $result['total_words'] = $keyword['total_words'];
    $result['domain_name'] = $_REQUEST['url'];
    
    //echo "<pre>"; print_r(json_decode($result['one_phrase'])); die();

    $one_phrase = json_decode($result['one_phrase']);
    $two_phrase = json_decode($result['two_phrase']);
    $three_phrase = json_decode($result['three_phrase']);
    $four_phrase = json_decode($result['four_phrase']);
    $total_words = $result['total_words'];
    
    

    $singlePhraseKeyword = '';
    $singlePhraseKeywordStart = '<div class="col-xl-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title pb-0 mb-15 border-0">Single Phrase Keywords </h5>
                            <div class="table-responsive">
                                <table class="table center-aligned-table mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>SINGLE KEYWORDS</th>
                                            <th>OCCURRENCES</th>
                                            <th>DENSITY</th>
                                            <th>POSSIBLE SPAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $singlePhraseKeywordEnd = '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>';

    $twoPhraseKeyword = '';
    $twoPhraseKeywordStart = '<div class="col-xl-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title pb-0 mb-15 border-0">2 Phrase Keywords </h5>
                            <div class="table-responsive">
                                <table class="table center-aligned-table mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>2 PHRASE KEYWORDS</th>
                                            <th>OCCURRENCES</th>
                                            <th>DENSITY</th>
                                            <th>POSSIBLE SPAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $twoPhraseKeywordEnd = '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>';
    
    $threePhraseKeyword = '';
    $threePhraseKeywordStart = '<div class="col-xl-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title pb-0 mb-15 border-0">3 Phrase Keywords </h5>
                            <div class="table-responsive">
                                <table class="table center-aligned-table mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>3 PHRASE KEYWORDS</th>
                                            <th>OCCURRENCES</th>
                                            <th>DENSITY</th>
                                            <th>POSSIBLE SPAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $threePhraseKeywordEnd = '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>';
    
    $fourPhraseKeyword = '';
    $fourPhraseKeywordStart = '<div class="col-xl-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="card-title pb-0 mb-15 border-0">4 Phrase Keywords </h5>
                            <div class="table-responsive">
                                <table class="table center-aligned-table mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>4 PHRASE KEYWORDS</th>
                                            <th>OCCURRENCES</th>
                                            <th>DENSITY</th>
                                            <th>POSSIBLE SPAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $fourPhraseKeywordEnd = '</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>';

    foreach ($one_phrase as $key => $value) {
        $possibleSpam = '';
        $occurence = round((($value / $total_words) * 100), 3) . '%';
        if (in_array(strtolower($key), $array_spam_keyword))
            $possibleSpam = "Yes";
        else
            $possibleSpam = 'No';
        $singlePhraseKeyword .= '<tr>
                                    <td>' . $key . '</td>
                                    <td>' . $value . '</td>
                                    <td class="text-info">' . $occurence . '</td>
                                    <td>'.$possibleSpam.'</td>
                                </tr>';
    }
    $singlePhraseKeyword = $singlePhraseKeywordStart . $singlePhraseKeyword . $singlePhraseKeywordEnd;
    
    foreach ($two_phrase as $key => $value) {
        $possibleSpam = '';
        $occurence = round((($value / $total_words) * 100), 3) . '%';
        if (in_array(strtolower($key), $array_spam_keyword))
            $possibleSpam = "Yes";
        else
            $possibleSpam = 'No';
        $twoPhraseKeyword .= '<tr>
                                    <td>' . $key . '</td>
                                    <td>' . $value . '</td>
                                    <td class="text-info">' . $occurence . '</td>
                                    <td>'.$possibleSpam.'</td>
                                </tr>';
    }
    $twoPhraseKeyword = $twoPhraseKeywordStart . $twoPhraseKeyword . $twoPhraseKeywordEnd;

    foreach ($three_phrase as $key => $value) {
        $possibleSpam = '';
        $occurence = round((($value / $total_words) * 100), 3) . '%';
        if (in_array(strtolower($key), $array_spam_keyword))
            $possibleSpam = "Yes";
        else
            $possibleSpam = 'No';
        $threePhraseKeyword .= '<tr>
                                    <td>' . $key . '</td>
                                    <td>' . $value . '</td>
                                    <td class="text-info">' . $occurence . '</td>
                                    <td>'.$possibleSpam.'</td>
                                </tr>';
    }
    $threePhraseKeyword = $threePhraseKeywordStart . $threePhraseKeyword . $threePhraseKeywordEnd;

    foreach ($four_phrase as $key => $value) {
        $possibleSpam = '';
        $occurence = round((($value / $total_words) * 100), 3) . '%';
        if (in_array(strtolower($key), $array_spam_keyword))
            $possibleSpam = "Yes";
        else
            $possibleSpam = 'No';
        $fourPhraseKeyword .= '<tr>
                                    <td>' . $key . '</td>
                                    <td>' . $value . '</td>
                                    <td class="text-info">' . $occurence . '</td>
                                    <td>'.$possibleSpam.'</td>
                                </tr>';
    }
    $fourPhraseKeyword = $fourPhraseKeywordStart . $fourPhraseKeyword . $fourPhraseKeywordEnd;
    
}

echo json_encode(array('htmlResult' => $singlePhraseKeyword . $twoPhraseKeyword . $threePhraseKeyword . $fourPhraseKeyword, 'htmlTotalCunt' => $total_words));
?>