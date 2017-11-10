<?php $dir = ".."; include($dir . "/header.php"); ?>
<body onload = "pageReload()">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
var pageNum = 1;
function next(){
  pageNum++;
  document.getElementById('page').innerHTML = pageNum;
  pageReload();
}
function prev(){
  pageNum--;
  document.getElementById('page').innerHTML = pageNum;
  pageReload();
}
function pageReload() {
  //
  // var pageNum = document.getElementById('page').value;
  //   console.log(pageNum);
      document.getElementById('tba').innerHTML = ""
  $.ajax({
    url: 'https://www.thebluealliance.com/api/v3/teams/' + pageNum,
    headers: {
        'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
    },
    method: 'GET',
    dataType: 'json',
    success: function(data){
      for (var i = 0; i < data.length; i++) {
        if(data[i].nickname!=''){
             document.getElementById('tba').innerHTML=  document.getElementById('tba').innerHTML +  data[i].nickname + "<br>City: " +data[i].city +"<br><br>";
        }
      }
    }
  })
  return false;
}
</script>

<h1>The Blue Alliance Teams</h1>

  <button type="button" name="prev" onclick="prev()">Prev</button>
  <p style = "display: inline;"id = "page">1</p>
  <button type="button" name="next" onclick="next()">Next</button>

<!-- </form> -->

<div id="tba" style="width:100%;height:400px;"></div>
</body>
