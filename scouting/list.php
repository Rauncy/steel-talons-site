<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
	<h1 class = "title">Scouting Entries</h1>
	<span class = "formText">Sort by: </span>
  <select id="sortMethod" onchange = "reloadData()">
		<option value = "Switch Cubes">Switch Cubes</option>
		<option value = "Scale Cubes">Scale Cubes</option>
		<option value = "Power-Up Cubes">Power-Up Cubes</option>
		<option value = "Aggregate">Aggregate</option>
		<option value = "Team Number">Team Number</option>
		<option value = "Match Number">Match Number</option>
	</select>
</center>
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
  req.open("GET", "listraw.php", true);
  req.send();
  setTimeout('reloadData()', 20000);
}
reloadData();
</script>
