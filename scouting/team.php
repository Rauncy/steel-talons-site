<?php $dir = ".."; include($dir . "/header.php"); include($dir . "/globals.php");?>
<link rel = "stylesheet" href = "/css/scouting.css">
<?php
if(isset($_POST["search"])){
	header("Location: /scouting/team?id=".$_POST["teamSearch"]);
	die();
}
$teamNum = 0;
$driveTrain = "";
$autoDesc = "";
$abilities = "";
$avgCubes = 0;
$avgClimbs = 0;
$avgClimbAssts = 0;

if(session_status()===2){
  //Use database for user validation and creation
  $servername = "localhost";
  $username = "root";
  $password = "admin";
  $conn = new mysqli($servername, $username, $password, "robotics");
  if($conn->connect_error){
    die();
  }
  $teamNum = $_GET["id"];
  $teamBasicData = $conn->query("select * from ScoutingTeams where TeamNumber = ". $teamNum . ";");
  if(gettype($teamBasicData)!="boolean"&&$teamBasicData->num_rows>0){
    $teamBasicData = $teamBasicData->fetch_assoc();
    $drivetrain = $teamBasicData["Drivetrain"];
    $autoDesc = $teamBasicData["AutoDesc"];
    $abilities = $teamBasicData["Abilities"];
  }else{
    unset($teamBasicData);
  }
  $teamScoutData = $conn->query("select * from Scouting where Team = ".$teamNum." and Competition = \"".$currentComp."\" and Year = ".$currentYear.";");
  if(gettype($teamScoutData)!="boolean"&&$teamScoutData->num_rows !== 0){
    $matchesPlayed = $teamScoutData->num_rows;
    $totalSwitch = 0;
    $totalScale = 0;
    $totalVault = 0;
    $totalClimbs = 0;
    $totalClimbAssts = 0;
    foreach($teamScoutData as $data)
    {
      $scoutID = $data["ScoutingID"];
      $teamPlayData = $conn->query("select * from Scouting2018 where ScoutingReport = ".$scoutID.";");
      if($teamPlayData->num_rows !== 0)
      {
        $currentData = $teamPlayData->fetch_assoc();
        $totalSwitch += $currentData["Switch"];
        $totalScale += $currentData["Scale"];
        $totalVault += $currentData["Vault"];
        if($currentData["EndPos"] == "Climb")
        {
          $totalClimbs++;
        }
        $totalClimbAssts += $currentData["ClimbAssts"];
      }
    }
    $avgSwitch = $totalSwitch/$matchesPlayed;
    $avgScale = $totalScale/$matchesPlayed;
    $avgVault = $totalVault/$matchesPlayed;
    $avgCubes = ($totalSwitch+$totalScale+$totalVault)/$matchesPlayed;
    $avgClimbs = $totalClimbs/$matchesPlayed;
    $avgClimbAssts = $totalClimbAssts/$matchesPlayed;
  }else{
    unset($teamScoutData);
  }
}
?>
<center>
	<h1 class = "title">Team <?php echo $teamNum; ?> Stats</h1>
  <br>
  <form action="teamScouting" method = "post">
    <input type="number" name = "teamSearch" placeholder="Team Number" required></input>
    <input type="submit" name="search" value="Search" class = "teamScoutingSubmit"></input>
  </form>
  <br>
  <?php if(isset($teamBasicData)||isset($teamScoutData)):?>
    <div class="formContainer">
      <?php if(isset($teamBasicData)): ?>
        <span class="formTitle">Properties</span>
        <table class="listTable">
          <tr class = "tableEven">
            <td align = "right">Drivetrain: </td>
        		<td align = "left"><?php echo $drivetrain; ?></td>
        	</tr>
        	<tr class = "tableOdd">
        		<td align = "right">Auto:</td>
        		<td align = "left"><?php echo $autoDesc; ?></td>
        	</tr>
        	<tr class = "tableEven">
            <td align = "right">Abilities:</td>
        		<td align = "left"><?php echo $abilities; ?></td>
          </tr>
            <?php if(isset($teamScoutData)):?>
            <tr class = "tableOdd">
              <td align = "right">Switch:</td>
          		<td align = "left" id="switchstat"><?php echo sprintf("%.2f", $avgSwitch); ?></td>
          	</tr>
            <tr class = "tableEven">
              <td align = "right">Scale:</td>
          		<td align = "left"  id="scalestat"><?php echo sprintf("%.2f", $avgScale); ?></td>
          	</tr>
            <tr class = "tableOdd">
              <td align = "right">Vault:</td>
          		<td align = "left" id="vaultstat"><?php echo sprintf("%.2f", $avgVault); ?></td>
          	</tr>
            <tr class = "tableEven" id="avgstat">
              <td align = "right">Cubes:</td>
          		<td align = "left" id="avgstat"><?php echo sprintf("%.2f", $avgCubes); ?></td>
          	</tr>
          	<tr class = "tableOdd">
              <td align = "right">Climbs: </td>
          		<td align = "left" id="climbstat">	<?php echo sprintf("%.2f", $avgClimbs); ?></td>
          	</tr>
          	<tr class = "tableEven">
              <td align = "right">Assists: </td>
          		<td align = "left" id="asststat"><?php echo sprintf("%.2f", $avgClimbAssts); ?></td>
            </tr>
						<script type="text/javascript">

						var reqrank = new XMLHttpRequest();
						reqrank.onload = function(){
							if(this.status == 200){
								console.log(reqscout.responseText);
								var data = JSON.parse(reqscout.responseText);

								for(var i in reqrank){
									if(i=="total"){
										document.getElementById("stat".).innerHTML = data["stat"];
									}else{
										document.getElementById("avgstat").innerHTML = data[i+"stat"];
									}
								}

							}
						};

						function reloadRanks(){
							reqrank.open("GET", "/stats/rankings?id="+<?php echo $teamNum; ?>, true);
							reqrank.send();
							setTimeout(reloadRanks(), 20000);
						}

						reloadRanks();

						</script>
          <?php endif;?>
        </table>
        <br>
        <br>
      <?php else: ?>
        <span class="formTitle">Properties not submitted</span><br><br>
      <?php endif;
      if(isset($teamScoutData)):?>
      <span class="formTitle">Previous Matches</span>
      <br>
      <select id="sortMethod" onchange = "reloadScout()">
        <option value = "Match Number">Match Number</option>
        <option value = "Switch Cubes">Switch Cubes</option>
        <option value = "Scale Cubes">Scale Cubes</option>
        <option value = "Power-Up Cubes">Power-Up Cubes</option>
        <option value = "Aggregate">Aggregate Cubes</option>
      </select>
      <div id="results" style = "margin-top: 25px;"></div>
    </div>
		<script type = "text/javascript" defer>
		const perm = <?php echo (isset($_SESSION["perm"]) ? $_SESSION["perm"] : "100");?>;


		var reqscout = new XMLHttpRequest();
		reqscout.onload = function(){
		  if(this.status == 200){
				console.log(reqscout.responseText);
		    var data = JSON.parse(reqscout.responseText);
		    var how = document.getElementById("sortMethod");
		    var selected = how.options[how.selectedIndex].value;
		    switch(selected){
		      case "Switch Cubes":
		        how = function(a, b){return b.switch-a.switch};
		      break;
		      case "Scale Cubes":
		        how = function(a, b){return b.scale-a.scale};
		      break;
		      case "Power-Up Cubes":
		        how = function(a, b){return b.vault-a.vault};
		      break;
					case "Aggregate":
						how = function(a,b){return (b.vault+b.scale+b.switch)-(a.vault+a.scale+a.switch)}
						break;
					case "Match Number":
						how = function(a,b){return a.match-b.match};
						break;
		      default:
		        how = function(a, b){return 0};
		    }
		    data.sort(how);
		    var ret;
		    if(data.length>0){
		      ret="<table class='listTable'><thead><tr style='border-bottom: 2px solid black'>"+(perm<=1?"<th>Author</th>":"")+"<th>Match</th><th>Switch</th><th>Scale</th><th>Vault</th><th>Penalties</th><th>Notes</th><th>Start Pos</th><th>Auto Abilities</th><th>Playstyle</th><th>End Position</th><th>Climb Assists</th></tr></thead><tbody>";
		      for(var i=0;i<data.length;i++){
		        ret+="<tr class='tableRow "+(i%2===0?"tableEven":"tableOdd")+"'>"+(perm<=1?"<td>"+data[i].author+"</td>":"")+"<td>"+data[i].match+"</td><td>"+data[i].switch+"</td><td>"+data[i].scale+"</td><td>"
						+data[i].vault+"</td><td>"+data[i].penalties+"</td><td>"+data[i].notes+"</td><td>"+(data[i].start==0?"Left":(data[i].start==1?"Center":"Right"))+"</td><td>"+
		        (!data[i].auto?"None":data[i].auto)+"</td><td>"+(data[i].style==0?"Defensive":(data[i].style==1?"Offensive":"Both"))+"</td><td>"+(data[i].end==0?"Field":(data[i].end==1?"Platform":"Climb"))+"</td><td>"
						+data[i].assts+"</td></tr>";
		      }
		      ret+="</tbody></table>";
		    }else{
		      ret = "<h2 class='postNotif'>There are no entries yet.</h2>";
		    }
		    document.getElementById("results").innerHTML = ret;
		  }
		};

		function reloadScout(){
		  reqscout.open("GET", "teamraw.php?id="+<?php echo $teamNum; ?>, true);
		  reqscout.send();
		  setTimeout('reloadScout()', 20000);
		}
		reloadScout();
		</script>
    <?php else:?>
      <span class="formTitle">Previous matches not submitted</span>
    <?php endif;?>
  <?php else:?>
    <h2 class="postNotif">This team has neither team scouting data nor match scouting data</h2>
  <?php endif;?>
</center>
<?php include($dir . "/footer.php") ?>
