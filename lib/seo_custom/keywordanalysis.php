<?php

require_once 'simple_dom.php';

function raino_trim($str) {
    $str = Trim(htmlspecialchars($str));
    return $str;
}

function get_meta_tag($html) {
    $doc = new DOMDocument();
    @$doc->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">' . $html);
    $nodes = $doc->getElementsByTagName('title');

    if (isset($nodes->item(0)->nodeValue))
        $title = $nodes->item(0)->nodeValue;
    else
        $title = "";

    $response = array();
    $response['title'] = $title;

    $metas = $doc->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') != '')
            $response[$meta->getAttribute('name')] = $meta->getAttribute('content');
    }

    return $response;
}

function clean_with_www($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://'), '', $site);
    return $site;
}

$array_spam_keyword = array("as seen on", "buying judgments", "order status", "dig up dirt on friends",
    "additional income", "double your", "earn per week", "home based", "income from home", "money making",
    "opportunity", "while you sleep", "$$$", "beneficiary", "cash", "cents on the dollar", "claims",
    "cost", "discount", "f r e e", "hidden assets", "incredible deal", "loans", "money",
    "mortgage rates", "one hundred percent free", "price", "quote", "save big money", "subject to credit",
    "unsecured debt", "accept credit cards", "credit card offers", "investment decision",
    "no investment", "stock alert", "avoid bankruptcy", "consolidate debt and credit",
    "eliminate debt", "get paid", "lower your mortgage rate", "refinance home", "acceptance",
    "chance", "here", "leave", "maintained", "never", "remove", "satisfaction", "success",
    "dear [email/friend/somebody]", "ad", "click", "click to remove", "email harvest", "increase sales",
    "internet market", "marketing solutions", "month trial offer", "notspam",
    "open", "removal instructions", "search engine listings", "the following form", "undisclosed recipient",
    "we hate spam", "cures baldness", "human growth hormone", "lose weight spam", "online pharmacy",
    "stop snoring", "vicodin", "#1", "4u", "billion dollars", "million", "being a member",
    "cannot be combined with any other offer", "financial freedom", "guarantee",
    "important information regarding", "mail in order form", "nigerian", "no claim forms", "no gimmick",
    "no obligation", "no selling", "not intended", "offer", "priority mail", "produced and sent out",
    "stuff on sale", "they’re just giving it away", "unsolicited", "warranty", "what are you waiting for?",
    "winner", "you are a winner!", "cancel at any time", "get", "print out and fax", "free",
    "free consultation", "free grant money", "free instant", "free membership", "free preview ",
    "free sample ", "all natural", "certified", "fantastic deal", "it’s effective", "real thing",
    "access", "apply online", "can't live without", "don't hesitate", "for you", "great offer", "instant",
    "now", "once in lifetime", "order now", "special promotion", "time limited", "addresses on cd",
    "brand new pager", "celebrity", "legal", "phone", "buy", "clearance", "orders shipped by",
    "meet singles", "be your own boss", "earn $", "expect to earn", "home employment", "make $",
    "online biz opportunity", "potential earnings", "work at home", "affordable",
    "best price", "cash bonus", "cheap", "collect", "credit", "earn", "fast cash",
    "hidden charges", "insurance", "lowest price", "money back", "no cost", "only '$'", "profits",
    "refinance", "save up to", "they keep your money -- no refund!", "us dollars",
    "cards accepted", "explode your business", "no credit check", "requires initial investment",
    "stock disclaimer statement ", "calling creditors", "consolidate your debt", "financially independent",
    "lower interest rate", "lowest insurance rates", "social security number", "accordingly", "dormant",
    "hidden", "lifetime", "medium", "passwords", "reverses", "solution", "teen", "friend",
    "auto email removal", "click below", "direct email", "email marketing",
    "increase traffic", "internet marketing", "mass email", "more internet traffic", "one time mailing",
    "opt in", "sale", "search engines", "this isn't junk", "unsubscribe",
    "web traffic", "diagnostics", "life insurance", "medicine", "removes wrinkles",
    "valium", "weight loss", "100% free", "50% off", "join millions",
    "one hundred percent guaranteed", "billing address", "confidentially on all orders", "gift certificate",
    "have you been turned down?", "in accordance with laws", "message contains", "no age restrictions",
    "no disappointment", "no inventory", "no purchase necessary", "no strings attached", "obligation",
    "per day", "prize", "reserves the right", "terms and conditions", "trial", "vacation",
    "we honor all", "who really wins?", "winning", "you have been selected",
    "compare", "give it away", "see for yourself", "free access", "free dvd", "free hosting",
    "free investment", "free money", "free priority mail", "free trial",
    "all new", "congratulations", "for free", "outstanding values", "risk free",
    "act now!", "call free", "do it today", "for instant access", "get it now",
    "info you requested", "limited time", "now only", "one time", "order today",
    "supplies are limited", "urgent", "beverage", "cable converter", "copy dvds", "luxury car",
    "rolex", "buy direct", "order", "shopper", "score with babes", "compete for your business",
    "earn extra cash", "extra income", "homebased business", "make money", "online degree",
    "university diplomas", "work from home", "bargain", "big bucks", "cashcashcash", "check",
    "compare rates", "credit bureaus", "easy terms", 'for just "$xxx"', "income", "investment",
    "million dollars", "mortgage", "no fees", "pennies a day", "pure profit", "save $",
    "serious cash", "unsecured credit", "why pay more?", "check or money order", "full refund",
    "no hidden costs", "sent in compliance", "stock pick", "collect child support",
    "eliminate bad credit", "get out of debt", "lower monthly payment", "pre-approved",
    "your income", "avoid", "freedom", "home", "lose", "miracle", "problem", "sample",
    "stop", "wife", "hello", "bulk email", "click here", "direct marketing", "form",
    "increase your sales", "marketing", "member", "multi level marketing", "online marketing",
    "performance", "sales", "subscribe", "this isn't spam", "visit our website",
    "will not believe your eyes", "fast viagra delivery", "lose weight",
    "no medical exams", "reverses aging", "viagra", "xanax", "100% satisfied", "billion",
    "join millions of americans", "thousands", "call", "deal", "giving away",
    "if only it were that easy", "long distance phone offer", "name brand", "no catch",
    "no experience", "no middleman", "no questions asked", "no-obligation", "off shore", "per week",
    "prizes", "shopping spree", "the best rates", "unlimited", "vacation offers", "weekend getaway",
    "win", "won", "you’re a winner!", "copy accurately", "print form signature",
    "sign up free today", "free cell phone", "free gift", "free installation",
    "free leads", "free offer", "free quote", "free website", "amazing", "drastically reduced",
    "guaranteed", "promise you", "satisfaction guaranteed", "apply now",
    "call now", "don't delete", "for only", "get started now", "information you requested",
    "new customers only", "offer expires", "only", "please read",
    "take action now", "while supplies last", "bonus", "casino",
    "laser printer", "new domain extensions", "stainless steel"
);

function get_general_content($url, $proxy = "") {


    $ch = curl_init(); // initialize curl handle
    /* curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_VERBOSE, 0); */
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
    curl_setopt($ch, CURLOPT_REFERER, 'http://' . $url);
    curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 120); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method

    /*     * ** Using proxy of public and private proxy both *** */

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");

    $content = curl_exec($ch); // run the whole process

    curl_close($ch);

    return $content;
}

function strip_html_tags($text) {
    // PHP's strip_tags() function will remove tags, but it
    // doesn't remove scripts, styles, and other unwanted
    // invisible text between tags.  Also, as a prelude to
    // tokenizing the text, we need to insure that when
    // block-level tags (such as <p> or <div>) are removed,
    // neighboring words aren't joined.
    $text = preg_replace(
            array(
        // Remove invisible content
        '@<head[^>]*?>.*?</head>@siu',
        '@<style[^>]*?>.*?</style>@siu',
        '@<script[^>]*?.*?</script>@siu',
        '@<object[^>]*?.*?</object>@siu',
        '@<embed[^>]*?.*?</embed>@siu',
        '@<applet[^>]*?.*?</applet>@siu',
        '@<noframes[^>]*?.*?</noframes>@siu',
        '@<noscript[^>]*?.*?</noscript>@siu',
        '@<noembed[^>]*?.*?</noembed>@siu',
        // Add line breaks before & after blocks
        '@<((br)|(hr))@iu',
        '@</?((address)|(blockquote)|(center)|(del))@iu',
        '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
        '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
        '@</?((table)|(th)|(td)|(caption))@iu',
        '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
        '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
        '@</?((frameset)|(frame)|(iframe))@iu',
            ), array(
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
        "\n\$0", "\n\$0",
            ), $text);

    // Remove all remaining tags and comments and return.
    return strip_tags($text);
}

function mb_count_words($string) {
    preg_match_all('/[\pL\pN\pPd]+/u', $string, $matches);
    return count($matches[0]);
}

function content_analysis($url) {
    /*     * *Remove last backslash from url* */

    $response = array();


    $url = trim($url, "/");

    $blocked_by_robots_txt = "";

    $content = get_general_content($url);
    $html = new simple_html_dom();
    $html->load($content);

    /*     * ***Check Robot File ****** */
    $robot_text = get_general_content($url . "/robots.txt");
    if ($robot_text != '') {
        preg_match("#Disallow: /\s#si", $robot_text, $match);
        if (empty($match))
            $blocked_by_robots_txt = "No";
        else
            $blocked_by_robots_txt = "Yes";
    } else
        $blocked_by_robots_txt = "No";


    /*     * **Get all meta tags **** */

    $meta_tag_information = get_meta_tag($content);

    /*     * *Check meta robot*** */

    if (isset($meta_tag_information['robots'])) {
        if (stripos($meta_tag_information['robots'], "index") !== false) {
            $blocked_by_meta_robot = "No";
        } else if (stripos($meta_tag_information['robots'], "noindex") !== false)
            $blocked_by_meta_robot = "Yes";
        else
            $blocked_by_meta_robot = "No";
    }

    else {
        $blocked_by_meta_robot = "No";
    }


    if (isset($meta_tag_information['robots'])) {
        if (stripos($meta_tag_information['robots'], "follow") !== false)
            $nofollowed_by_meta_robot = "No";
        else if (stripos($meta_tag_information['robots'], "nofollow") !== false)
            $nofollowed_by_meta_robot = "Yes";
        else
            $nofollowed_by_meta_robot = "No";
    }

    else {
        $nofollowed_by_meta_robot = "No";
    }


    /*     * ***Extract all headings ****** */


    for ($i = 1; $i <= 6; $i++) {

        $header_name = "h{$i}";
        $header_name_result = array();

        $headers = $html->find($header_name);

        if (isset($headers)) {
            foreach ($headers as $header) {
                $header_name_result[] = $header->plaintext;
            }
        }

        $response[$header_name] = $header_name_result;
    }

// keyword research
    // get 


    if (function_exists('iconv')) {
        $page_encoding = mb_detect_encoding($content);
        if (isset($page_encoding)) {
            $utf8_text = @iconv($page_encoding, "utf-8//IGNORE", $content);
            $raw_text = $utf8_text;
        } else
            $raw_text = $content;
    } else
        $raw_text = $content;


    $raw_text = strip_html_tags($raw_text);
    $raw_text = str_replace("&nbsp;", " ", $raw_text);

    $raw_text = str_replace("  ", " ", $raw_text);

    $total_number_of_words = str_word_count($raw_text);

    $raw_text = preg_replace('~\h*\[(?:[^][]+|(?R))*+]\h*~', ' ', $raw_text); // replacing chars between brackets

    $raw_text = html_entity_decode($raw_text, ENT_QUOTES, "UTF-8"); /* Decode HTML entities */
    // keeping raw text into a different variable $raw_text_for_2_words for phrase keyword extract
    $raw_text_for_2_words = $raw_text;

    $punc_marks = array('!', '@', '#', '$', '%', '^', '&', '*', '-', '+', '/', '"', ':', '|', ',', '.', ';', '(', ')', '{', '}', '[', ']');

    $raw_text = str_replace($punc_marks, "", $raw_text);

    $raw_text = preg_replace("/\r|\n/", " ", $raw_text);

    // $raw_text = preg_replace('/[^A-Za-z0-9\-]/', " ", $raw_text); // deleting all special chars 
    $raw_text = trim($raw_text); // trimming text

    $array_preposition = array(
        "a's", 'accordingly', 'again', 'allows', 'also', 'amongst', 'anybody', 'anyways', 'appropriate', 'aside',
        'available', 'because', 'before', 'below', 'between', 'by', "can't", 'certain', 'com', 'consider',
        'corresponding', 'definitely', 'different', "don't", 'each', 'else', 'et', 'everybody', 'exactly',
        'fifth', 'follows', 'four', 'gets', 'goes', 'greetings', 'has', 'he', 'her', 'herein', 'him', 'how', "i'm",
        'immediate', 'indicate', 'instead', 'it', 'itself', 'know', 'later', 'lest', 'likely', 'ltd', 'me', 'more', 'must',
        'nd', 'needs', 'next', 'none', 'nothing', 'of', 'okay', 'ones', 'others', 'ourselves', 'own', 'placed', 'probably',
        'rather', 'regarding', 'right', 'saying', 'seeing', 'seen', 'serious', 'she', 'so', 'something', 'soon',
        'still', "t's", 'th', 'that', 'theirs', 'there', 'therein', "they'd", 'third', 'though', 'thus', 'toward',
        'try', 'under', 'unto', 'used', 'value', 'vs', 'way', "we've", "weren't", 'whence', 'whereas', 'whether', "who's",
        'why', 'within', "wouldn't", "you'll", 'yourself', 'able', 'across', 'against', 'almost', 'although',
        'an', 'anyhow', 'anywhere', 'are', 'ask', 'away', 'become', 'beforehand', 'beside', 'beyond',
        "c'mon", 'cannot', 'certainly', 'come', 'considering', 'could', 'described', 'do', 'done',
        'edu', 'elsewhere', 'etc', 'everyone', 'example', 'first', 'for', 'from', 'getting', 'going', 'had', "hasn't",
        "he's", 'here', 'hereupon', 'himself', 'howbeit', "i've", 'in', 'indicated', 'into', "it'd", 'just', 'known',
        'latter', 'let', 'little', 'mainly', 'mean', 'moreover', 'my', 'near', 'neither', 'nine', 'noone', 'novel', 'off',
        'old', 'only', 'otherwise', 'out', 'particular', 'please', 'provides', 'rd', 'regardless', 'said', 'says', 'seem',
        'self', 'seriously', 'should', 'some', 'sometime', 'sorry', 'sub', 'take', 'than', "that's", 'them',
        "there's", 'theres', "they'll", 'this', 'three', 'to', 'towards', 'trying', 'unfortunately', 'up',
        'useful', 'various', 'want', 'we', 'welcome', 'what', 'whenever', 'whereby', 'which', 'whoever',
        'will', 'without', 'yes', "you're", 'yourselves', 'about', 'actually', "ain't", 'alone', 'always', 'and', 'anyone',
        'apart', "aren't", 'asking', 'awfully', 'becomes', 'behind', 'besides', 'both', "c's", 'cant', 'changes', 'comes',
        'contain', "couldn't", 'despite', 'does', 'down', 'eg', 'enough', 'even', 'everything', 'except', 'five',
        'former', 'further', 'given', 'gone', "hadn't", 'have', 'hello', "here's", 'hers', 'his', 'however',
        'ie', 'inasmuch', 'indicates', 'inward', "it'll", 'keep', 'knows', 'latterly', "let's", 'look', 'many', 'meanwhile',
        'most', 'myself', 'nearly', 'never', 'no', 'nor', 'now', 'often', 'on', 'onto', 'ought', 'outside', 'particularly',
        'plus', 'que', 're', 'regards', 'same', 'second', 'seemed', 'selves', 'seven', "shouldn't", 'somebody',
        'sometimes', 'specified', 'such', 'taken', 'thank', 'thats', 'themselves', 'thereafter', 'thereupon', "they're",
        'thorough', 'through', 'together', 'tried', 'twice', 'unless', 'upon', 'uses', 'very', 'wants', "we'd",
        'well', "what's", 'where', 'wherein', 'while', 'whole', 'willing', "won't", 'yet', "you've", 'zero',
        'above', 'after', 'all', 'along', 'am', 'another', 'anything', 'appear', 'around', 'associated', 'be', 'becoming',
        'being', 'best', 'brief', 'came', 'cause', 'clearly', 'concerning', 'containing', 'course', 'did', "doesn't",
        'downwards', 'eight', 'entirely', 'ever', 'everywhere', 'far', 'followed', 'formerly', 'furthermore', 'gives',
        'got', 'happens', "haven't", 'help', 'hereafter', 'herself', 'hither', "i'd", 'if', 'inc', 'inner', 'is', "it's",
        'keeps', 'last', 'least', 'like', 'looking', 'may', 'merely', 'mostly', 'name', 'necessary', 'nevertheless',
        'nobody', 'normally', 'nowhere', 'oh', 'once', 'or', 'our', 'over', 'per', 'possible', 'quite', 'really',
        'relatively', 'saw', 'secondly', 'seeming', 'sensible', 'several', 'since', 'somehow', 'somewhat',
        'specify', 'sup', 'tell', 'thanks', 'the', 'then', 'thereby', 'these', "they've", 'thoroughly', 'throughout', 'too',
        'tries', 'two', 'unlikely', 'us', 'using', 'via', 'was', "we'll", 'went', 'whatever', "where's", 'whereupon',
        'whither', 'whom', 'wish', 'wonder', 'you', 'your', 'according', 'afterwards', 'allow', 'already', 'among', 'any',
        'anyway', 'appreciate', 'as', 'at', 'became', 'been', 'believe', 'better', 'but', 'can', 'causes', 'co',
        'consequently', 'contains', 'currently', "didn't", 'doing', 'during', 'either', 'especially', 'every', 'ex',
        'few', 'following', 'forth', 'get', 'go', 'gotten', 'hardly', 'having', 'hence', 'hereby', 'hi', 'hopefully',
        "i'll", 'ignored', 'indeed', 'insofar', "isn't", 'its', 'kept', 'lately', 'less', 'liked', 'looks', 'maybe',
        'might', 'much', 'namely', 'need', 'new', 'non', 'not', 'obviously', 'ok', 'one', 'other', 'ours', 'overall',
        'perhaps', 'presumably', 'qv', 'reasonably', 'respectively', 'say', 'see', 'seems', 'sent', 'shall', 'six',
        'someone', 'somewhere', 'specifying', 'sure', 'tends', 'thanx', 'their', 'thence', 'therefore',
        'they', 'think', 'those', 'thru', 'took', 'truly', 'un', 'until', 'use', 'usually', 'viz', "wasn't", "we're",
        'were', 'when', 'whereafter', 'wherever', 'who', 'whose', 'with', 'would', "you'd", 'yours', 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'D', 'E',
        'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'provide', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1st',
        '2nd', '3rd', '000', '10', 0, '11'
    );

    /*     * **** Get one word Keyword **** */
    // uppercasing $array_preposition values for delete from final array

    $one_keyword = array();

    $array_uppercase = array();
    foreach ($array_preposition as $value)
        $array_uppercase[] = ucfirst($value);

    $sample_array = explode(" ", $raw_text);  // exploding raw text into array

    $sample_array = array_map('trim', $sample_array);

    $sample_array = array_filter($sample_array); // deleting blank values

    $sample_array = array_slice($sample_array, 0);  // recreating index for no gap in array
    // deleting stop words and prepositions from array
    $final_array_first_diff = array_udiff($sample_array, $array_preposition, 'strcasecmp');

    $one_keyword_filter = array();
    foreach ($final_array_first_diff as $w) {

        preg_match("#\d*#", $w, $matches);
        if (empty($matches[0]))
            $one_keyword_filter[] = $w;
    }

    // creating an array of keywords as key and its occurence as value
    $one_keyword = array_count_values($one_keyword_filter);

    arsort($one_keyword); // sorting from top to bottom 

    $one_keyword = array_slice($one_keyword, 0, 20); // reduece array to 20 elements 

    $two_keyword = array();

    $number_of_words = mb_count_words($raw_text); // find the number of total words in raw text

    $word = explode(" ", $raw_text);  // exploding raw text to an array of words

    $word = array_map('trim', $word);

    $sample_array_2_words = $word;

    $sample_array_2_words = array_filter($sample_array_2_words);  // filter array

    $sample_array_2_words = array_slice($sample_array_2_words, 0); // slicing array	

    $half = 2; // length of phrase

    for ($i = 0; $i < $number_of_words - 1; $i++) { // first for loop for total number of words
        $ingram = ""; // a blank string		

        for ($j = $i; $j < $half + $i; $j++) { // 2nd for loop for creating all the phrases
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }

        if ($ingram != "")
            $two_keyword[] = $ingram;  // saving phrases to an array
    }

    $two_keyword = array_count_values($two_keyword);
    arsort($two_keyword);
    $two_keyword = array_slice($two_keyword, 0, 20);  // reduce array to first 20 elements

    /*     * **** Three Words ******* */

    // $half=(int) count($word)/2; 

    $three_keyword = array();

    $half = 3;

    for ($i = 0; $i < $number_of_words - 1; $i++) {
        $ingram = "";

        for ($j = $i; $j < $half + $i; $j++) {
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }
        if ($ingram != "")
            $three_keyword[] = $ingram;
    }


    $three_keyword = array_count_values($three_keyword);
    arsort($three_keyword);
    $three_keyword = array_slice($three_keyword, 0, 20);

    /*     * *** Get 4 phrase keyword ********** */

    // $half=(int) count($word)/2; 
    $four_keyword = array();
    $half = 4;
    for ($i = 0; $i < $number_of_words - 1; $i++) {
        $ingram = "";
        for ($j = $i; $j < $half + $i; $j++) {
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }
        if ($ingram != "")
            $four_keyword[] = $ingram;
    }

    $four_keyword = array_count_values($four_keyword);
    arsort($four_keyword);
    $split_word = array_slice($four_keyword, 0, 20);


    $response['blocked_by_robot_txt'] = $blocked_by_robots_txt;
    $response['meta_tag_information'] = $meta_tag_information;
    $response['blocked_by_meta_robot'] = $blocked_by_meta_robot;
    $response['nofollowed_by_meta_robot'] = $nofollowed_by_meta_robot;

    $response['one_phrase'] = $one_keyword;
    $response['two_phrase'] = $two_keyword;
    $response['three_phrase'] = $three_keyword;
    $response['four_phrase'] = $split_word;

    $response['total_words'] = $total_number_of_words;

    return $response;
}

$domain = $_REQUEST['domain'];
$arrResplose = array();

$keyword = content_analysis($domain);
$result['one_phrase'] = json_encode($keyword['one_phrase']);
$result['two_phrase'] = json_encode($keyword['two_phrase']);
$result['three_phrase'] = json_encode($keyword['three_phrase']);
$result['four_phrase'] = json_encode($keyword['four_phrase']);
$result['total_words'] = $keyword['total_words'];
$result['domain_name'] = $domain;

$one_phrase = json_decode($result['one_phrase']);
$two_phrase = json_decode($result['two_phrase']);
$three_phrase = json_decode($result['three_phrase']);
$four_phrase = json_decode($result['four_phrase']);
$total_words = $result['total_words'];


$one = array();
$two = array();
$three = array();
$four = array();
$i = 0;
foreach ($one_phrase as $key => $value) {
    $occurence = round(($value / $total_words) * 100, 3) . '%';
    if (in_array(strtolower($key), $array_spam_keyword))
        $yes = "Yes";
    else
        $yes = 'No';

    $one[$i] = array(($key), ($value), ($occurence), ($yes));
    $i++;
}
$i = 0;
foreach ($two_phrase as $key => $value) {
    $occurence = round(($value / $total_words) * 100, 3) . '%';

    if (in_array(strtolower($key), $array_spam_keyword))
        $yes = "Yes";
    else
        $yes = 'No';

    $two[$i] = array(($key), ($value), ($occurence), ($yes));
    $i++;
}


$i = 0;
foreach ($three_phrase as $key => $value) {
    $occurence = round(($value / $total_words) * 100, 3) . "%";

    if (in_array(strtolower($key), $array_spam_keyword))
        $yes = "Yes";
    else
        $yes = 'No';

    $three[$i] = array(($key), ($value), ($occurence), ($yes));
    $i++;
}

$i = 0;
foreach ($four_phrase as $key => $value) {
    $occurence = round(($value / $total_words) * 100, 3) . '%';
    if (in_array(strtolower($key), $array_spam_keyword))
        $yes = "Yes";
    else
        $yes = 'No';
    $four[$i] = array(($key), ($value), ($occurence), ($yes));
    $i++;
}

$arrResplose['one_phrase'] = $one;
$arrResplose['two_phrase'] = $two;
$arrResplose['three_phrase'] = $three;
$arrResplose['four_phrase'] = $four;

//echo "<pre>"; print_r($arrResplose);
echo json_encode($arrResplose);
?>

