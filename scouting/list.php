<?php $dir = ".."; include($dir . "/header.php"); include($dir."/globals.php");
$year = (isset($_GET["year"]) ? $_GET["year"] : $currentYear);
$comp = (isset($_GET["competition"]) ? $_GET["competition"] : $currentComp);
?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
	<h1 class = "title">Scouting Entries</h1>
	<h1 class = "subtitle"><?php echo $comp." ".$year;?></h1>
	<?php if(isset($_SESSION["perm"])&&$_SESSION["perm"]<=5):?>
		<span class = "formText">Sort by: </span>
	  <select id="sortMethod" onchange = "reloadData()">
			<option value = "Match Number">Match Number</option>
			<option value = "Team Number">Team Number</option>
			<option value = "Aggregate">Aggregate Points</option>
		</select>
		<script type = "text/javascript" defer>
		const perm = <?php echo (isset($_SESSION["perm"]) ? $_SESSION["perm"] : "100");?>;
		const year = <?php echo $year;?>;
		const comp = "<?php echo $comp;?>";
		const yearSpecific = {
			2018:{"Switch":"Switch","Scale":"Scale","Valut":"Vault","ClimbAssists":"Assisted Climbs"},
			2019:{"HatchesRocket":"Rocket Hatches","HatchesCargo":"Hatches CargoShip","CargoRocket":"Rocket Cargo","CargoCargo":"Cargo CargoShip","HatchLevels":"Max Hatch Level","CargoLevels":"Max Cargo Level"}
		};

		var req = new XMLHttpRequest();
		req.onload = function(){
		  if(this.status == 200){
				console.log(req.responseText);
		    var data = JSON.parse(req.responseText);
		    var how = document.getElementById("sortMethod");
		    var selected = how.options[how.selectedIndex].value;
		    switch(selected){
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
		      ret="<table class='listTable'><thead><tr style='border-bottom: 2px solid black'>"+(perm<=2?"<th>Author</th>":"")+"<th>Match</th><th>Team</th><th>Start Position</th><th>Auto Abilities</th><th>Abilities</th><th>"+Object.values(yearSpecific[year]).join("</th><th>")+"</th><th>End Position</th><th>Penalties</th><th>Notes</th></thead><tbody>";
		      for(var i=0;i<data.length;i++){
						let yearlyPrepared = [];
						Object.keys(yearSpecific[year]).forEach(v=>{
							yearlyPrepared.push(data[i][v]);
						});
						//TODO FORMAT START AND END POS
						ret+="<tr class=\""+(i%2==0?"tableOdd":"tableEven")+"\">"+(perm<=2?"<td>"+data[i].author+"</td>":"")+"<td>"+data[i].match+"</td><td>"+data[i].team+"</td><td>"+data[i].start+
							"</td><td>"+data[i].autoAbilities.join(", ")+"</td><td>"+data[i].abilities.join(", ")+"</td><td>"+yearlyPrepared.join("</td><td>")+"</td><td>"+data[i].end+"</td><td>"+data[i].penalties.join(", ")+"</td><td>"+data[i].notes+"</td></tr>"
		      }
		      ret+="</tbody></table>";
		    }else{
		      ret = "<h2 class='postNotif'>There are no entries yet.</h2>";
		    }
		    document.getElementById("results").innerHTML = ret;
		  }
		};

		function reloadData(){
		  req.open("GET", "/scouting/listraw.php?year="+year+"&competition="+comp, true);
		  req.send();
		  setTimeout('reloadData()', 20000);
		}
		reloadData();
		</script>
	<?php else:?>
		<h1 class="postNotif">You must login to access scouting data</h1>
	<?php endif;?>
</center>
<center>
	<div id="results" style = "margin-top: 25px;"></div>
</center>
<?php include($dir . "/footer.php") ?>
