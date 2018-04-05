<?php $dir = ".."; include($dir . "/header.php"); include($dir . "/globals.php");?>
<link rel = "stylesheet" href = "/css/scouting.css">
<?php
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
    $driveTrain = $teamBasicData["DriveTrain"];
    $autoDesc = $teamBasicData["AutoDesc"];
    $abilities = $teamBasicData["Abilities"];
    $teamScoutData = $conn->query("select * from Scouting where Team = ".$teamNum." and Competition = \"".$currentComp."\" and Year = ".$currentYear.";");
    if(gettype($teamScoutData)!="boolean"&&$teamScoutData->num_rows !== 0){
      $matchesPlayed = $teamScoutData->num_rows;
    	$totalCubes = 0;
      $totalClimbs = 0;
      $totalClimbAssts = 0;
      foreach($teamScoutData as $data)
      {
        $scoutID = $data["ScoutingID"];
        $teamPlayData = $conn->query("select * from Scouting2018 where ScoutingReport = ".$scoutID.";");
        if($teamPlayData->num_rows !== 0)
        {
  				$currentData = $teamPlayData->fetch_assoc();
          $totalCubes += $currentData["Switch"] + $currentData["Scale"] + $currentData["Vault"];
          if($currentData["EndPos"] == "Climb")
          {
            $totalClimbs++;
          }
          $totalClimbAssts += $currentData["ClimbAssts"];
        }
      }
      $avgCubes = $totalCubes/$matchesPlayed;
      $avgClimbs = $totalClimbs/$matchesPlayed;
      $avgClimbAssts = $totalClimbAssts/$matchesPlayed;
    }else{
      unset($teamScoutData);
    }
  }else{
    unset($teamBasicData);
  }
}
?>
<center>
	<h1 class = "title">Team <?php echo $teamNum; ?> Stats</h1>
  <div class="formContainer">
    <?php if(isset($teamBasicData)): ?>
      <span class="formTitle">Properties</span>
      <table class="formTable">
      </table>
    <?php else: ?>
      <span class="formTitle">Properties not submitted</span>
    <?php endif;
    if($teamScoutData)?>
    <span class="formTitle">Previous Matches</span>
    <table class="formTable">
    </table>
  </div>
</center>
<!--
OLD CODE
-->
<?php if(isset($teamBasicData)){?>
<table class = "statsTable">
  <tr>
    <td align = "right"> DriveTrain: </td>
		<td align = "left"><?php echo $driveTrain; ?></td>
	</tr>
	<tr>
		<td align = "right"> Autonomous Description: </td>
		<td align = "left"><?php echo $autoDesc; ?></td>
	</tr>
	<tr>
    <td align = "right"> Abilities: </td>
		<td align = "left"><?php echo $abilities; ?></td>
  </tr>
  <tr>
    <td align = "right">Cubes per Match: </td>
		<td align = "left"><?php echo $avgCubes; ?></td>
	</tr>
	<tr>
    <td align = "right">Climbs per Match: </td>
		<td align = "left">	<?php echo $avgClimbs; ?></td>
	</tr>
	<tr>
    <td align = "right">Climb Assists per Match: </td>
		<td align = "left"><?php echo $avgClimbAssts; ?></td>
  </tr>
</table>
<br>
<br>
<br>
<center>
	<div id="results" style = "margin-top: 25px;"></div>
</center>

<script type = "text/javascript" defer>
const perm = <?php echo (isset($_SESSION["perm"]) ? $_SESSION["perm"] : "100");?>;


var req = new XMLHttpRequest();
req.onload = function(){
  if(this.status == 200){
		console.log(req.responseText);
    var data = JSON.parse(req.responseText);
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
			case "Team Number":
				how = function(a,b){return a.team - b.team};
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
      ret="<table class='listTable'><thead><tr style='border-bottom: 2px solid black'>"+(perm<=1?"<th>Author</th>":"")+"<th>Team</th><th>Match</th><th>Switch</th><th>Scale</th><th>Vault</th><th>Penalties</th><th>Notes</th><th>Start Pos</th><th>Auto Abilities</th><th>Playstyle</th><th>End Position</th><th>Climb Assists</th></tr></thead><tbody>";
      for(var i=0;i<data.length;i++){
        ret+="<tr class='tableRow "+(i%2===0?"tableEven":"tableOdd")+"'>"+(perm<=1?"<td>"+data[i].author+"</td>":"")+"<td><a href=\"/scouting/team?id="+data[i].team+"\">"+data[i].team+"</a></td><td>"+data[i].match+"</td><td>"+data[i].switch+"</td><td>"+data[i].scale+"</td><td>"
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

function reloadData(){
  req.open("GET", "teamraw.php?team="+<?php echo $teamNum; ?>, true);
  req.send();
  setTimeout('reloadData()', 20000);
}
reloadData();
</script>
<?php
}else {
}?>
