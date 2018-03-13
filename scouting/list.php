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
			$query = $conn->query("select * from Scouting2018;");
      if(gettype($query)!="boolean"){
        $data = "[";
        for($i=0;$i<$query->num_rows;$i++){
          $lDat = $query->fetch_assoc();
          $gDat = $conn->query("select * from Scouting where ScoutingID = ".$lDat["ScoutingReport"])->fetch_assoc();
          $name = "<i>HIDDEN</i>";
          if($_SESSION["perm"]<=1){
            $name = $conn->query("select FirstName, LastName from Members where MemberID = ".$gDat["Author"])->fetch_assoc();
            $name = $name["FirstName"]." ".$name["LastName"];
          }
          $data.='{"team":"'.$gDat["Team"].'", "match":'.$gDat["MatchNumber"].', "start":'.$gDat["StartPos"].', "auto":"'.$gDat["AutoAbilities"].'", "abil":"'.$gDat["Abilities"].'", "style":'.$gDat["Playstyle"].', "author":"'.
            $name.'","penalties":"'.$gDat["Penalties"].'", "notes":"'.$gDat["Notes"].'", "switch":'.$lDat["Switch"].', "scale":'.$lDat["Scale"].', "vault":'.$lDat["Vault"].', "end":"'.$lDat["EndPos"].'", "assts":'
            .$lDat["ClimbAssts"].'}';
            if($i!==$query->num_rows-1) $data.=",";
        }
        $data.="]";
      }else{
        $data = "[]";
      }
    }
 ?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
	<h1 class = "title">Scouting Entries</h1>
	<br>
	<span class = "formText">Sort by: </span>
  <select id="sortMethod" onchange = "loadTable()">
		<option value = "Switch Cubes">Switch Cubes</option>
		<option value = "Scale Cubes">Scale Cubes</option>
		<option value = "Power-Up Cubes">Power-Up Cubes</option>
	</select>
</center>
<center>
	<div id="results" style = "display: inline; margin-left: 500px;">
	</div>
	<div id="scout" style="column-count: 1;font-size:12px;padding: 40px;"></div>
</center>
<script type = "text/javascript" defer>
const perm = <?php echo $_SESSION["perm"];?>;
function loadTable(){
  var data = JSON.parse('<?php echo $data?>');
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
    default:
      how = function(a, b){return 0};
  }
  data.sort(how);
  var ret;
  if(data.length>0){
    ret="<table class='listTable'><thead><tr style='border-bottom: 2px solid black'>"+(perm<=1?"<th>Author</th>":"")+"<th>Team</th><th>Match</th><th>Switch</th><th>Scale</th><th>Vault</th><th>Penalties (TODO FORMAT)</th><th>Notes</th><th>Start Pos</th><th>Auto Abilities (TODO FORMAT)</th><th>Playstyle</th><th>End Position</th><th>Climb Assists</th></tr></thead><tbody>";
    for(var i=0;i<data.length;i++){
      ret+="<tr class='"+(i%2===0?"tableEven":"tableOdd")+"'>"+(perm<=1?"<td>"+data[i].author+"</td>":"")+"<td>"+data[i].team+"</td><td>"+data[i].match+"</td><td>"+data[i].switch+"</td><td>"+data[i].scale+"</td><td>"+data[i].vault+"</td><td>"+data[i].penalties+"</td><td>"+data[i].notes+"</td><td>"+(data[i].start==0?"Left":(data[i].start==1?"Center":"Right"))+"</td><td>"+
      (!data[i].auto?"None":data[i].auto)+"</td><td>"+(data[i].style==0?"Defensive":"Offensive")+"</td><td>"+(data[i].end==0?"Field":(data[i].end==1?"Platform":"Climb"))+"</td><td>"+data[i].assts+"</td></tr>";
    }
    ret+="</tbody></table>";
  }else{
    ret = "<h1 class='title'>There are no entries yet.</h1>";
  }
  document.getElementById("results").innerHTML = ret;
}

loadTable();
</script>
