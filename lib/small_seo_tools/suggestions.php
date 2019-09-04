<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {

    $domain = clean_url($_REQUEST['url']);

    $mobile = json_decode(page_statistic_speed_mobile($domain));
    $desktop = json_decode(page_statistic_speed_desktop($domain));

    $d_redir = $desktop[0];
    $d_redir->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="' . $d_redir->url . '">', $d_redir->summary);
    $d_redir->summary = str_replace('{{END_LINK}}', '</a>', $d_redir->summary);
    $d_numredir = count($desktop[1]);
    $d_compress = $desktop[2];
    $d_compress->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="' . $d_compress->url . '">', $d_compress->summary);
    $d_compress->summary = str_replace('{{END_LINK}}', '</a>', $d_compress->summary);
    $d_leverage = $desktop[3];
    $d_leverage->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">', $d_leverage->summary);
    $d_leverage->summary = str_replace('{{END_LINK}}', '</a>', $d_leverage->summary);
    $d_response = $desktop[5];
    $d_response->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/Server">', $d_response->summary);
    $d_response->summary = str_replace('{{END_LINK}}', '</a>', $d_response->summary);
    $d_mincss = $desktop[7];
    $d_mincss->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $d_mincss->summary);
    $d_mincss->summary = str_replace('{{END_LINK}}', '</a>', $d_mincss->summary);
    $d_minhtml = $desktop[10];
    $d_minhtml->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $d_minhtml->summary);
    $d_minhtml->summary = str_replace('{{END_LINK}}', '</a>', $d_minhtml->summary);
    $d_minjs = $desktop[11];
    $d_minjs->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $d_minjs->summary);
    $d_minjs->summary = str_replace('{{END_LINK}}', '</a>', $d_minjs->summary);
    $d_renderblock = $desktop[14];
    $d_numrenderblockjs = $desktop[15][0];
    $d_numrenderblockcss = $desktop[15][1];
    $d_renderblock->summary = str_replace('{{NUM_SCRIPTS}}', "$d_numrenderblockjs", $d_renderblock->summary);
    $d_renderblock->summary = str_replace('{{NUM_CSS}}', "$d_numrenderblockcss", $d_renderblock->summary);
    $d_optimage = $desktop[18];
    $d_optimage->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">', $d_optimage->summary);
    $d_optimage->summary = str_replace('{{END_LINK}}', '</a>', $d_optimage->summary);
    $d_visible = $desktop[21];
    $d_visible->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">', $d_visible->summary);
    $d_visible->summary = str_replace('{{END_LINK}}', '</a>', $d_visible->summary);
    $d_visible->summary = str_replace('formatting and compressing images can save many bytes of data', 'prioritizing visible content can attract more visitors', $d_visible->summary);


    $m_redir = $mobile[0];
    $m_redir->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="' . $m_redir->redirecturl . '">', $m_redir->summary);
    $m_redir->summary = str_replace('{{END_LINK}}', '</a>', $m_redir->summary);
    $m_numredir = count($mobile[1]);
    $m_compress = $mobile[2];
    $m_compress->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="' . $m_compress->redirecturl . '">', $m_compress->summary);
    $m_compress->summary = str_replace('{{END_LINK}}', '</a>', $m_compress->summary);
    $m_leverage = $mobile[4];
    $m_leverage->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">', $m_leverage->summary);
    $m_leverage->summary = str_replace('{{END_LINK}}', '</a>', $m_leverage->summary);
    $m_response = $mobile[6];
    $m_response->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/Server">', $m_response->summary);
    $m_response->summary = str_replace('{{END_LINK}}', '</a>', $m_response->summary);
    $m_mincss = $mobile[8];
    $m_mincss->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $m_mincss->summary);
    $m_mincss->summary = str_replace('{{END_LINK}}', '</a>', $m_mincss->summary);
    $m_minhtml = $mobile[10];
    $m_minhtml->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $m_minhtml->summary);
    $m_minhtml->summary = str_replace('{{END_LINK}}', '</a>', $m_minhtml->summary);
    $m_minjs = $mobile[12];
    $m_minjs->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">', $m_minjs->summary);
    $m_minjs->summary = str_replace('{{END_LINK}}', '</a>', $m_minjs->summary);
    $m_renderblock = $mobile[14];
    $m_numrenderblockjs = $m_renderblock->summary_num_script;
    $m_numrenderblockcss = $m_renderblock->summary_num_css;
    $m_renderblock->summary = str_replace('{{NUM_SCRIPTS}}', "$m_numrenderblockjs", $m_renderblock->summary);
    $m_renderblock->summary = str_replace('{{NUM_CSS}}', "$m_numrenderblockcss", $m_renderblock->summary);
    $m_renderblock->summary_urlblock_header = str_replace('following ', '', $m_renderblock->summary_urlblock_header);
    $m_optimage = $mobile[17];
    $m_optimage->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">', $m_optimage->summary);
    $m_optimage->summary = str_replace('{{END_LINK}}', '</a>', $m_optimage->summary);
    $m_visible = $mobile[19];
    $m_visible->summary = str_replace('{{BEGIN_LINK}}', '<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">', $m_visible->summary);
    $m_visible->summary = str_replace('{{END_LINK}}', '</a>', $m_visible->summary);
    $m_visible->summary = str_replace('formatting and compressing images can save many bytes of data', 'prioritizing visible content can attract more visitors', $m_visible->summary);
    $m_usability = $mobile[20];
}
?>

<table class='table table-bordered table-striped'>
    <tr><td colspan='2'><h2>Desktop Suggestions</h2></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_redir->rule_name)); ?></b></td><td><?php echo $d_redir->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_compress->rule_name)); ?></b></td><td><?php echo $d_compress->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_leverage->rule_name)); ?></b></td><td><?php echo $d_leverage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_response->rule_name)); ?></b></td><td><?php echo $d_response->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_mincss->rule_name)); ?></b></td><td><?php echo $d_mincss->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_minhtml->rule_name)); ?></b></td><td><?php echo $d_minhtml->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_minjs->rule_name)); ?></b></td><td><?php echo $d_minjs->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_renderblock->rule_name)); ?></b></td><td><?php echo $d_renderblock->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_optimage->rule_name)); ?></b></td><td><?php echo $d_optimage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $d_visible->rule_name)); ?></b></td><td><?php echo $d_visible->summary; ?></td></tr>
</table>
<table class='table table-bordered table-striped'>
    <tr><td colspan='2'><h2>Mobile Suggestions</h2></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_redir->rule_name)); ?></b></td><td><?php echo $m_redir->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_compress->rule_name)); ?></b></td><td><?php echo $m_compress->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_leverage->rule_name)); ?></b></td><td><?php echo $m_leverage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_response->rule_name)); ?></b></td><td><?php echo $m_response->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_mincss->rule_name)); ?></b></td><td><?php echo $m_mincss->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_minhtml->rule_name)); ?></b></td><td><?php echo $m_minhtml->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_minjs->rule_name)); ?></b></td><td><?php echo $m_minjs->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_renderblock->rule_name)); ?></b></td><td><?php echo $m_renderblock->summary . ' ' . $m_renderblock->summary_urlblock_header; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_optimage->rule_name)); ?></b></td><td><?php echo $m_optimage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_', ' ', $m_visible->rule_name)); ?></b></td><td><?php echo $m_visible->summary; ?></td></tr>
    <tr><td><b><?php echo 'Usability Score'; ?></td><td><?php echo $m_usability->usability_score . ' / 100'; ?></td></tr>
</table>