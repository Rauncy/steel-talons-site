<?php $dir = "../"; include($dir . "/header.php"); ?>

<script src="index.js" charset="utf-8"></script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<div class = 'distribution_pie' style = "margin-left:2em;">
    <h2><strong>Power Cube Distribution</strong></h2>
    <canvas id="myCanvas" width="200" height="100" >
    Your browser does not support the HTML5 canvas tag.</canvas>
    <div id="myLegend"></div>
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


    $sql = "Select * from scouting where Team = '5427' ORDER BY MatchNumber DESC";
    $result = $conn->query($sql);


    $scaleArr = '';  $switchArr = '';  $vaultArr = '';
    while($row = $result->fetch_assoc()){
      $sql1 = "Select * from scouting2018 where ID = '".$row['ScoutingID']."'";

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
