<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
    if(isset($_POST["loginPassword"])&&isset($_POST["loginEmail"])){
      //Use database for user validation and creation
      $servername = "localhost";
      $username = "root";
      $password = "admin";

      $conn = new mysqli($servername, $username, $password, "robotics");

      if($conn->connect_error){
        die();
      }
			$dataMain = $conn->query("select * from Scouting2018;");

			if($result->num_rows > 0){
        if(!session_id()) session_start();
      }
    }
 ?>
<body onload = "pageReload()">
	<script type = "text/javascript">
		var data[] = <?php echo $data ?>;


	</script>
	<link rel = "stylesheet" href = "/css/scouting.css">
	<center>
		<h1 style = "display: inline;">Scouting Database</h1>
		<br>
		<span class = "formText">Sort by: </span><select>
			<option value = "Switch Cubes">Switch Cubes</option>
			<option value = "Scale Cubes">Scale Cubes</option>
			<option value = "Power-Up Cubes">Power-Up Cubes</option>
		</select>
	</center>
	<div style = "display: inline; margin-left: 500px; ">

	</div>
	<div id="scout" style="column-count: 1;font-size:12px;padding: 40px;"></div>
</body>
