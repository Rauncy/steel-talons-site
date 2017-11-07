<?php $dir = ".."; include($dir . "/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$.ajax({
  url: 'https://www.thebluealliance.com/api/v3/teams/1',
  headers: {
      'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
  },
  method: 'GET',
  dataType: 'json',
  success: function(data){
    var str= '';
    for (var i = 0; i < data.length; i++) {
        str += data[i].nickname + "<br>";
    }
    document.getElementById("tba").innerHTML = str;
  }
})
</script>

<h1>TBA</h1>
<!--  div for api for tba fuck blake-->
<div id="tba" style="width:100%;height:400px;"></div>
