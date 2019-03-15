<?php $dir = ".."; include($dir . "/header.php"); ?>
<!-- <body onload = "pageReload()"> -->
<body>


<script type="text/javascript">
function pageReload(event) {
		if(event.keyCode==13){
			var searchData = document.getElementById('srch').value;
			let params = new URLSearchParams(document.location.search.substring(1));
			let page = params.get("page");
			window.location = "?search="+searchData+"&page=1";
	 }
		return false;
}
</script>


	<h1 style = "display: inline;">The Blue Alliance Teams</h1>
	<div style = "display: inline; margin-left: 500px; ">
		<center>
		<input style="display:block"type="text" id="srch" onkeyup="pageReload(event)" placeholder="Search.."<?php if(isset($_GET["search"])) echo  " value=\"".$_GET['search']."\""; ?>>

		<a style=<?php if( $_GET['page']==1){ echo '"visibility: hidden;"';}else{echo "none";} ?>
		href=<?php $num = $_GET['page']; if($num>1){echo "?search=".$_GET['search']."&page=".($num-1); }?>><button type="button" name="prev" >Previous</button></a>

		<p style = "display: inline;padding: 20px;"id = "page"><?php echo $_GET['page'];?></p>

		<a style=<?php
		$servername = "localhost";
		$username = "root";
		$password = "admin";
		$dbname = "robotics";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		}

			 $sql = "SELECT * FROM teams WHERE name LIKE '%".$_GET["search"]."%'";


		$result = $conn->query($sql);


		$pages = floor($result->num_rows/500)+1;
	 if( $_GET['page']==$pages){ echo '"visibility: hidden;"';}else{echo "none";}?>
		href= <?php
		$num = $_GET['page'];
		echo "?search=".$_GET['search']."&page=".($num+1);
		?>	><button type="button" name="next" >Next</button></a>
	</div>



	<i style = "display: block"> --Click on Teams to Learn More--</i>
	<div id="tba" style="column-count: 5;font-size:10px;padding: 100px;line-height:20px;">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	$dbname = "robotics";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	  $sql = "SELECT * FROM teams WHERE name LIKE '%".$_GET["search"]."%'";


	$result = $conn->query($sql);

$teamsOnEachPage = 500;
$globals['count'] =0;
$startNum = $teamsOnEachPage*($_GET['page']-1);
$globals['page'] =0;

while($row = $result->fetch_assoc()) {
	if(strlen($row["name"])>20){
		$teamShort = substr($row["name"], 0, 15)."...";
	}
	else {
		$teamShort = $row["name"];
	}
	// echo $row["key"];
	if ($globals['count']>=$startNum && $globals['count']-$startNum<$teamsOnEachPage) {
		echo '<a target = "_blank" style="color: black;font-size: 14px;font-family: monospace;"  id = "'.$row["key"].'"href="/teams/team_profile.php?team_number=' .$row["key"].'" title = "'.$row["name"].'">'.$teamShort.'</a> '.'- ('.$row["key"].')<br><br>';
	}
	$globals['count']=$globals['count']+1;

}

	$conn->close();

?>

 </div>

<div id = "background"><img class = "stretch" src=<?php echo $dir . "/images/teamsBackground.jpg"?> alt="image"></div>
<style media="screen">
/*  to span image above across page, background image*/
#background {
		width: 100%;
		height: 100%;
		position: fixed;
		left: 0px;
		top: 0px;
		z-index: -999;
}

.stretch {
		width:100%;
		height:100%;
}
</style>

</body>
