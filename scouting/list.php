<?php $dir = ".."; include($dir . "/header.php"); ?>
<script type="text/javascript">
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       document.getElementsByClassName("rec_teams")[0].innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "recTeams.txt", true);
xhttp.send();
</script>
<center><h2>Alliance Reccomendations</h2>
<div class="rec_teams"></div>

</center>
