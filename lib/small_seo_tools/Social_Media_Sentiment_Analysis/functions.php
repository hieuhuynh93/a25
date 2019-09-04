<?php
function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
 
    return $data;
}

function truncate_string ($string, $maxlength, $extension) {
   $cutmarker = "**cut_here**";
   if (strlen($string) > $maxlength) {
       $string = wordwrap($string, $maxlength, $cutmarker);
       $string = explode($cutmarker, $string);
       $string = $string[0] . $extension;
   }

   return $string;
}

function time_elapsed_string($ptime) {
    $etime = time() - $ptime;
    
    if ($etime < 1) {
        return '0 seconds';
    }
    
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}

function webpage2txt($document) {
     
    $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
        '@<style[^>]*?>.*?</style>@si',    // Strip style tags properly
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<![\s\S]*?–[ \t\n\r]*>@',         // Strip multi-line comments including CDATA
        '/\s{2,}/',
    );
 
    $text = preg_replace($search, "\n", html_entity_decode($document));
 
    $pat[0] = "/^\s+/";
    $pat[2] = "/\s+\$/";
    $rep[0] = "";
    $rep[2] = " ";
 
    $text = preg_replace($pat, $rep, trim($text));
    
    $text = str_replace(array("\n\r", "\r\n", "\n", "\r", "\t"), " ", $text);
    $text = preg_replace('/\W/', ' ', $text);
 	$text = preg_replace('/\s+/', ' ', $text);
    return $text;
    
}
function sent_ratio($a, $b) {
    $_a = $a;
    $_b = $b;
; 
    while ($_b != 0) {

        $remainder = $_a % $_b;
        $_a = $_b;
        $_b = $remainder;   
    }

    $gcd = abs($_a);
	$p = ($a / $gcd);
	$n = ($b / $gcd);
	if ($p == "") $p = 0;
	if ($n == "") $n = 0;	
    return  $p . ':' . $n;

}

$stop_words = array("a","about","above","across","after","again","against","all","almost","alone","along","already","also","although","always","among","an","and","another","any","anybody","anyone","anything","anywhere","are","area","areas","around","as","ask","asked","asking","asks","at","away","b","back","backed","backing","backs","be","became","because","become","becomes","been","before","began","behind","being","beings","best","better","between","big","both","but","by","c","came","can","cannot","case","cases","certain","certainly","clear","clearly","come","could","d","did","differ","different","differently","do","does","done","down","down","downed","downing","downs","during","e","each","early","either","end","ended","ending","ends","enough","even","evenly","ever","every","everybody","everyone","everything","everywhere","f","face","faces","fact","facts","far","felt","few","find","finds","first","for","four","from","full","fully","further","furthered","furthering","furthers","g","gave","general","generally","get","gets","give","given","gives","go","going","good","goods","got","great","greater","greatest","group","grouped","grouping","groups","h","had","has","have","having","he","her","here","herself","high","high","high","higher","highest","him","himself","his","how","however","i","if","important","in","interest","interested","interesting","interests","into","is","it","its","itself","j","just","k","keep","keeps","kind","knew","know","known","knows","l","large","largely","last","later","latest","least","less","let","lets","like","likely","long","longer","longest","m","made","make","making","man","many","may","me","member","members","men","might","more","most","mostly","mr","mrs","much","must","my","myself","n","necessary","need","needed","needing","needs","never","new","new","newer","newest","next","no","nobody","non","noone","not","nothing","now","nowhere","number","numbers","o","of","off","often","old","older","oldest","on","once","one","only","open","opened","opening","opens","or","order","ordered","ordering","orders","other","others","our","out","over","p","part","parted","parting","parts","per","perhaps","place","places","point","pointed","pointing","points","possible","present","presented","presenting","presents","problem","problems","put","puts","q","quite","r","rather","really","right","right","room","rooms","s","said","same","saw","say","says","second","seconds","see","seem","seemed","seeming","seems","sees","several","shall","she","should","show","showed","showing","shows","side","sides","since","small","smaller","smallest","so","some","somebody","someone","something","somewhere","state","states","still","still","such","sure","t","take","taken","than","that","the","their","them","then","there","therefore","these","they","thing","things","think","thinks","this","those","though","thought","thoughts","three","through","thus","to","today","together","too","took","toward","turn","turned","turning","turns","two","u","under","until","up","upon","us","use","used","uses","v","very","w","want","wanted","wanting","wants","was","way","ways","we","well","wells","went","were","what","when","where","whether","which","while","who","whole","whose","why","will","with","within","without","work","worked","working","works","would","x","y","year","years","yet","you","young","younger","youngest","your","yours","z");
$positive_words = array("absolutely","adorable","accepted","acclaimed","accomplish","accomplishment","achievement","action","active","admire","adventure","affirmative","affluent","agree","agreeable","amazing","angelic","appealing","approve","aptitude","attractive","awesome","beaming","beautiful","believe","beneficial","bliss","bountiful","bounty","brave","bravo","brilliant","bubbly","calm","celebrated","certain","champ","champion","charming","cheery","choice","classic","classical","clean","commend","composed","congratulation","constant","cool","courageous","creative","cute","dazzling","delight","delightful","distinguished","divine","earnest","easy","ecstatic","effective","effervescent","efficient","effortless","electrifying","elegant","enchanting","encouraging","endorsed","energetic","energized","engaging","enthusiastic","essential","esteemed","ethical","excellent","exciting","exquisite","fabulous","fair","familiar","famous","fantastic","favorable","fetching","fine","fitting","flourishing","fortunate","free","fresh","friendly","fun","funny","generous","genius","genuine","giving","glamorous","glowing","good","gorgeous","graceful","great","green","grin","growing","handsome","happy","harmonious","healing","healthy","hearty","heavenly","honest","honorable","honored","hug","idea","ideal","imaginative","imagine","impressive","independent","innovate","innovative","instant","instantaneous","instinctive","intuitive","intellectual","intelligent","inventive","jovial","joy","jubilant","keen","kind","knowing","knowledgeable","laugh","legendary","light","learned","lively","lovely","lucid","lucky","luminous","marvelous","masterful","meaningful","merit","meritorious","miraculous","motivating","moving","natural","nice","novel","now","nurturing","nutritious","okay","one","one-hundred percent","open","optimistic","paradise","perfect","phenomenal","pleasurable","plentiful","pleasant","poised","polished","popular","positive","powerful","prepared","pretty","principled","productive","progress","prominent","protected","proud","quality","quick","quiet","ready","reassuring","refined","refreshing","rejoice","reliable","remarkable","resounding","respected","restored","reward","rewarding","right","robust","safe","satisfactory","secure","seemly","simple","skilled","skillful","smile","soulful","sparkling","special","spirited","spiritual","stirring","stupendous","stunning","success","successful","sunny","super","superb","supporting","surprising","terrific","thorough","thrilling","thriving","tops","tranquil","transforming","transformative","trusting","truthful","unreal","unwavering","up","upbeat","upright","upstanding","valued","vibrant","victorious","victory","vigorous","virtuous","vital","vivacious","wealthy","welcome","well","whole","wholesome","willing","wonderful","wondrous","worthy","wow","yes","yummy","zeal","zealous");
$negative_words = array("abysmal","adverse","alarming","angry","annoy","anxious","apathy","appalling","atrocious","awful","bad","banal","barbed","belligerent","bemoan","beneath","boring","broken","callous","can't","clumsy","coarse","cold","cold-hearted","collapse","confused","contradictory","contrary","corrosive","corrupt","crazy","creepy","criminal","cruel","cry","cutting","dead","decaying","damage","damaging","dastardly","deplorable","depressed","deprived","deformed","deny","despicable","detrimental","dirty","disease","disgusting","disheveled","dishonest","dishonorable","dismal","distress","don't","dreadful","dreary","enraged","eroding","evil","fail","faulty","fear","feeble","fight","filthy","foul","frighten","frightful","gawky","ghastly","grave","greed","grim","grimace","gross","grotesque","gruesome","guilty","haggard","hard","hard-hearted","harmful","hate","hideous","homely","horrendous","horrible","hostile","hurt","hurtful","icky","ignore","ignorant","ill","immature","imperfect","impossible","inane","inelegant","infernal","injure","injurious","insane","insidious","insipid","jealous","junky","lose","lousy","lumpy","malicious","mean","menacing","messy","misshapen","missing","misunderstood","moan","moldy","monstrous","naive","nasty","naughty","negate","negative","never","no","nobody","nondescript","nonsense","not","noxious","objectionable","odious","offensive","old","oppressive","pain","perturb","pessimistic","petty","plain","poisonous","poor","prejudice","questionable","quirky","quit","reject","renege","repellant","reptilian","repulsive","repugnant","revenge","revolting","rocky","rotten","rude","ruthless","sad","savage","scare","scary","scream","severe","shoddy","shocking","sick","sickening","sinister","slimy","smelly","sobbing","sorry","spiteful","sticky","stinky","stormy","stressful","stuck","stupid","substandard","suspect","suspicious","tense","terrible","terrifying","threatening","ugly","undermine","unfair","unfavorable","unhappy","unhealthy","unjust","unlucky","unpleasant","upset","unsatisfactory","unsightly","untoward","unwanted","unwelcome","unwholesome","unwieldy","unwise","upset","vice","vicious","vile","villainous","vindictive","wary","weary","wicked","woeful","worthless","wound","yell","yucky","zero");
?>