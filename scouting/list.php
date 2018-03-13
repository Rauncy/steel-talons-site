<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
    if(session_status()===2){
      //Use database for user validation and creation
      $servername = "localhost";
      $username = "root";
      $password = "admin";

      $conn = new mysqli($servername, $username, $password, "robotics");

      if($conn->connect_error){
        die();
      }
<<<<<<< HEAD
			$dataMain = $conn->query("select * from scouting;");

			if($result->num_rows > 0){
        if(!session_id()) session_start();
=======
			$query = $conn->query("select * from Scouting2018;");
      if(gettype($query)!="boolean"){
        $data = "[";
        for($i=0;$i<$query->num_rows;$i++){
          $lDat = $query->fetch_assoc();
          $gDat = $conn->query("select * from Scouting where ScoutingID = ".$lDat["ScoutingReport"])->fetch_assoc();
          $data = $data.'{team:"'.$gDat["Team"].'", match:"'.$gDat["MatchNumber"].'", start:"'.$gDat["StartPos"].'", auto:"'.$gDat["AutoAbilities"].'", abil:"'.$gDat["Abilities"].'", style:"'.$gDat["Playstyle"].'",
          penalties:"'.$gDat["Penalties"].'", notes:"'.$gDat["notes"].'", switch:"'.$lDat["Switch"].'", scale:"'.$lDat["Scale"].'", vault:"'.$lDat["Vault"].'", end:"'.$lDat["EndPos"].'", assts:"'.$lDat["ClimbAssists"].'"},';
        }
        $data = $data."]";
      }else{
        $data = "[]";
>>>>>>> 18234216e259eb8db6a5591edae70a8d18b19d0b
      }
    }
 ?>
<body onload = "pageReload()">
	<link rel = "stylesheet" href = "/css/scouting.css">
	<center>
		<h1 class = "title">Scouting Entries</h1>
		<br>
		<span class = "formText">Sort by: </span><select>
			<option value = "Switch Cubes">Switch Cubes</option>
			<option value = "Scale Cubes">Scale Cubes</option>
			<option value = "Power-Up Cubes">Power-Up Cubes</option>
		</select>
	</center>
<<<<<<< HEAD
	<div style = "display: inline; margin-left: 500px; ">
    
=======
	<div id="results" style = "display: inline; margin-left: 500px;">
>>>>>>> 18234216e259eb8db6a5591edae70a8d18b19d0b
	</div>
	<div id="scout" style="column-count: 1;font-size:12px;padding: 40px;"></div>
  <script type = "text/javascript" defer>
		var data = JSON.parse("<?php echo $data?>");
    var ret;
    if(data.length>0){
      ret = "<h1 class='title'>Sike Nigga</h1>"
    }else{
      ret = "<h1 class='title'>There are no entries yet.</h1>";
    }
    document.getElementById("results").innerHTML = ret;
	</script>
</body>
