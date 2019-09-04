<?php //include_once 'dbconn.php';  ?>

<?php require_once 'cssfiles.php'; ?>
<style>
    .main-container{
        width: 96% !important;
        max-width: 98% !important;
    }
</style>
<div class="row">   
            <?php

            class spin_my_data {

                function randomSplit($string) {
                    $string = Trim($string);
                    $res = -1;
                    $finalData = "";
                    $loopinput = $this->parse_br($string);
                    for ($loop = 0; $loop < count($loopinput); $loop++) {
                        for ($loopx = 0; $loopx < count($loopinput[$loop]); $loopx++) {
                            if (!$loopinput[$loop][$loopx] == "" || "/n") {
                                $res++;
                                if (strstr($loopinput[$loop][$loopx], "|")) {
                                    $out = explode("|", $loopinput[$loop][$loopx]);
                                    $output[$res] = $out[rand(0, count($out) - 1)];
                                } else {
                                    $output[$res] = $loopinput[$loop][$loopx];
                                }
                            }
                        }
                    }
                    for ($loop = 0; $loop < count($output); $loop++) {
                        $finalData .= $output[$loop];
                    }
                    return $finalData;
                }

                function spinMyData($data, $lang) {

                    $patern_code_1 = "/<[^<>]+>/us";
                    $patern_code_2 = "/\[[^\[\]]+\]/i";
                    $patern_code_3 = '/\$@.*?\$@/i';

                    $data = Trim($data);
                    preg_match_all($patern_code_1, $data, $found1, PREG_PATTERN_ORDER);
                    preg_match_all($patern_code_2, $data, $found2, PREG_PATTERN_ORDER);
                    preg_match_all($patern_code_3, $data, $found3, PREG_PATTERN_ORDER);
                    $htmlcodes = $found1[0];
                    $bbcodes = $found2[0];
                    $vbcodes = $found3[0];
                    $founds = array();
                    $current_dir = dirname(__file__);
                    $sel_lang = Trim($lang);

                    $arr_data = array_merge($htmlcodes, $bbcodes, $vbcodes);
                    foreach ($arr_data as $code) {
                        $code_md5 = md5($code);
                        $data = str_replace($code, '%%!%%' . $code_md5 . '%%!%%', $data);
                    }

                    $file = file('en_db.sdata');

                    foreach ($file as $line) {

                        $synonyms = explode('|', $line);
                        foreach ($synonyms as $word) {
                            $word = trim($word);
                            if ($word != '') {
                                $word = str_replace('/', '\/', $word);

                                if (preg_match('/\b' . $word . '\b/i', $data)) {
                                    $founds[md5($word)] = str_replace(array("\n", "\r"), '', $line);
                                    $data = preg_replace('/\b' . $word . '\b/i', md5($word), $data);
                                }
                            }
                        }
                    }

                    foreach ($arr_data as $code) {
                        $code_md5 = md5($code);
                        $data = str_replace('%%!%%' . $code_md5 . '%%!%%', $code, $data);
                    }

                    $array_count = count($founds);

                    if ($array_count != 0) {
                        foreach ($founds as $code => $value) {
                            $data = str_replace($code, '{' . $value . '}', $data);
                        }
                    }

                    return $data;
                }

                function parse_br($string) {
                    @$string = explode("{", $string);
                    for ($loop = 0; $loop < count($string); $loop++) {
                        @$data[$loop] = explode("}", $string[$loop]);
                    }
                    return $data;
                }

            }

            if (isset($_POST['data']))
                if (!isset($error)) {
                    $userInput = stripslashes($_POST['data']);
                    //$regUserInput = truncate($userInput,30,150);
                    $spin = new spin_my_data;
                    $spinned = $spin->spinMyData($userInput, 'en');
                    $spinned_data = $spin->randomSplit($spinned);
                    $spinned_data = preg_replace_callback(
                            '/([.!?]\s*\w)/', function($m) {
                        return strtoupper(strlen($m[1]) ? "$m[1]$m[2]" : $m[2]);
                    }, $spinned_data);
                    $spinned_data = implode(PHP_EOL, array_map("ucfirst", explode(PHP_EOL, $spinned_data)));
                    $spinned_data = ucfirst($spinned_data);
                }
            ?>

            <div class="container main-container">
                <div class="row">
                    <?php
                    //if($themeOptions['general']['sidebar'] == 'left')
                    //require_once(THEME_DIR."sidebar.php");
                    ?>
                    <div class="col-md-12 col-lg-12 col-sm-12 main-index">

                        <div class="xd_top_box">
                            <?php //echo $ads_720x90;  ?>
                        </div>

                        <h2 id="title"><?php //echo $data['tool_name'];    ?></h2>

                        <?php //if ($pointOut != 'output') {  ?>

                        <p><?php //echo $lang['6'];    ?>
                        </p>
                        <form method="POST" action="">
                            <textarea style="width: 100%;" placeholder='Enter The Article Here' name="data" id="data" rows="20" class="form-control"></textarea><br />
                            <input class='btn btn-success' type="submit" name="submit" value="Submit">
                            <br />
                        </form>     

                        <?php
                        //} else { 
                        //Output Block
                        if (isset($error)) {

                            echo '<br/><br/><div class="alert alert-error">
                                    <strong>Alert!</strong> ' . $error . '
                                    </div><br/><br/>
                                    <div class="text-center"><a class="btn btn-info" href="' . $toolURL . '">' . $lang['12'] . '</a>
                                    </div><br/>';
                        } else {
                            ?>

                            <h4><?php //echo $lang['10'];    ?></h4>

                            <?php if (isset($_POST['submit'])) { ?>
                                <textarea placeholder='Article Rewritten here' id="textArea" readonly="" rows="20" class="form-control"><?php if (isset($spinned_data)) echo $spinned_data; ?></textarea>
                                <div class="text-center">
                                    <br /> &nbsp; <br />
                                </div>

                                <br />

                                <div class="xd_top_box">
                                    <?php //echo $ads_720x90; ?>
                                </div>

                                                    <!--h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name'];   ?></h2>
                                                    <p>
                                <?php //echo $data['about_tool']; ?>
                                                </p--> 
                            <?php }
                        } //}   
                        ?>

                    </div>              

                    <?php
                    //if($themeOptions['general']['sidebar'] == 'right')
                    //require_once(THEME_DIR."sidebar.php");
                    ?>    		
                </div>
            </div> <br />
        </div>

<?php require_once 'jsfiles.php'; ?>