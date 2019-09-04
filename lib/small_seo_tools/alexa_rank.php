<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = clean_url($my_url);
    $my_url = "http://www.$my_url";
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = $lang['327'];
    } else {
        $regUserInput = $my_url;
        $my_url = parse_url($my_url);
        $host = clean_url($my_url['host']);
        $myHost = ucfirst($host);
        $alexa = alexaRank($host);
        $alexa_rank = $alexa[0];
        $alexa_pop = $alexa[1];
        $regional_rank = $alexa[2];
        $alexa_back = $alexa[3];
    }
}
?>
<div class="widget-box">
    <div class="widget-header">
        <h4 class="widget-title lighter smaller">
            <?php echo 'How popular is ' . $myHost; ?>?</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <br />
            <table class="table table-bordered">
                <tbody><tr>
                        <th style="width: 200px;">No.</th>
                        <th><?php echo 'Stats'; ?></th>
                    </tr>
                    <tr>
                        <td><strong><?php echo 'Global Rank'; ?></strong></td>
                        <td><?php echo $alexa_rank; ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo 'Popularity at'; ?></strong></td>
                        <td><?php echo $alexa_pop; ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo 'Regional Rank'; ?></strong></td>
                        <td><?php echo $regional_rank; ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo Backlinks; ?></strong></td>
                        <td><?php echo $alexa_back; ?></td>
                    </tr>


                </tbody></table>
            <br />
            <div class="row text-center" style="margin-left: 5px; margin-right: 5px;">
                <div class="col-md-5" style="margin-left: 15px;">
                    <h3 class="box-title"><?php echo 'Traffic Rank'; ?></h3>
                    <img src="https://traffic.alexa.com/graph?w=300&amp;h=230&amp;o=f&amp;c=1&amp;y=t&amp;b=ffffff&amp;n=666666&amp;r=2y&amp;u=<?php echo $host; ?>" />
                </div>

                <div class="col-md-5" style="margin-left: 15px;">
                    <h3 class="box-title"><?php echo 'Search Engine Traffic'; ?></h3>
                    <img src="https://traffic.alexa.com/graph?w=300&amp;h=230&amp;o=f&amp;c=1&amp;y=q&amp;b=ffffff&amp;n=666666&amp;r=2y&amp;u=<?php echo $host; ?>" />
                </div>

            </div>
            <br />
        </div><!-- /.widget-main -->
    </div><!-- /.widget-body -->
</div>