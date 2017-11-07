<?php $dir = ".."; include($dir . "/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function pageReload() {

  var pageNum = document.getElementById('page').value;
    console.log(pageNum);
      document.getElementById('tba').innerHTML = ""
  $.ajax({
    url: 'https://www.thebluealliance.com/api/v3/teams/' + pageNum,
    headers: {
        'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
    },
    method: 'GET',
    dataType: 'json',
    success: function(data){
    console.log("hi "+data.length);
      for (var i = 0; i < data.length; i++) {
        if(data[i].nickname!=''){
             document.getElementById('tba').innerHTML=  document.getElementById('tba').innerHTML +  data[i].nickname + " " +data[i].country +"<br>";
        }
      }
    }
  })
  return false;
}
</script>

<h1>TBA</h1>
<!-- <form> -->
  <input type="text" name="page" id = "page" value="1">
  <input type="button" name="sub" onclick="pageReload()" value="Submit">
<!-- </form> -->

<div id="tba" style="width:100%;height:400px;"></div>
