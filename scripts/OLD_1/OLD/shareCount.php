<?php


$url = "https://www.google.com";

$fbShareCountURL= "https://graph.facebook.com/?id=https://www.indiatimes.com/";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function GooglePlus(url) {
// bypass same-origin restriction
  jQuery.getJSON('http://anyorigin.com/get?callback=?&url=' + encodeURIComponent('https://plusone.google.com/_/+1/fastbutton?url=http://' + url), function (data){
  alert(data.contents.match(/{c: (\d+)/)[1]);
});
}
GooglePlus('https://www.google.com');
</script>