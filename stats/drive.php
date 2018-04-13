<?php $dir = "../"; include($dir . "/header.php"); include($dir . "/globals.php");?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="index.js" charset="utf-8"></script>

<div class = "wrapper" style = "position: relative;width: 400px;height: 300px;">
    <div style="position: absolute;top: 0;left: 0; ">
      <h2 style="font-family: 'Oswald'; ">Team <?php echo $_GET['num']; ?> Stats</h2>
      <div id="chartContainer" style="height: 300px; width: 400px;"></div>
    </div>
 
  <div class = 'distribution_pie' style = "margin-left:40em; position: absolute;top: 0;left: 0;">
      <h2 style="font-family: 'Oswald'; ">Power Cube Distribution</h2>
      <canvas id="myCanvas" width="300" height="300" >Your browser does not support the HTML5 canvas.</canvas>
      <div id="myLegend"></div>
  </div>
</div>

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


    $stats = "";
    $scale =0;$switch =0;$vault =0;


    $sql = "Select * from scouting where Team = '".$_GET['num']."' and Competition = '".$currentComp."' and Year = ".$currentYear." ORDER BY MatchNumber DESC;";
    $result = $conn->query($sql);


    $scaleArr = '';  $switchArr = '';  $vaultArr = '';
    while($row = $result->fetch_assoc()){
      $sql1 = "Select * from scouting2018 where ID = ".$row['ScoutingID'].";";

      $row1 = $conn->query($sql1)->fetch_assoc();

      $scaleArr .= "{y: ".$row1['Scale'].", x: ".$row['MatchNumber']."},";
      $scale += $row1['Scale'];

      $switchArr .= "{y: ".$row1['Switch'].", x: ".$row['MatchNumber']."},";
      $switch += $row1['Switch'];

      $vaultArr .= "{y: ".$row1['Vault'].", x: ".$row['MatchNumber']."},";
      $vault += $row1['Vault'];
    }


  echo "<script>lineDistribution([".substr($scaleArr, 0, -1)."],[".substr($switchArr, 0, -1)."],[".substr($vaultArr, 0, -1)."]);displayCanvas(".$scale.", ".$switch.", ".$vault.")</script>";

 ?>
