<<<<<<< current
<?php
header("ContentType: text/plain");
if(isset($_COOKIE["PHPSESSID"])) session_start();
if(session_status()!==2) die();

$dir = "..";
include($dir . "/globals.php");

$servername = "localhost";
$username = "root";
$password = "admin";

$conn = new mysqli($servername, $username, $password, "robotics");

if($conn->connect_error){
  die();
}

//SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='yourdatabasename' AND `TABLE_NAME`='yourtablename';
//use in the future for automated JSON object creation and parsing

$query = $conn->query("select * from Scouting where Competition = \"".$currentComp."\" and Year = ".$currentYear.";");
echo "select * from Scouting where Competition = \"".$currentComp."\" and Year = ".$currentYear.";<br>";
if(gettype($query)!="boolean"&&isset($_SESSION["perm"])){
  $data = "[";
  for($i=0;$i<$query->num_rows;$i++){
    $gDat = $query->fetch_assoc();
    $lDat = $conn->query("select * from Scouting2018 where ScoutingReport = ".$gDat["ScoutingID"].";")->fetch_assoc();
    $data.='{"team":"'.$gDat["Team"].'", "match":'.$gDat["MatchNumber"].', "start":'.$gDat["StartPos"].', "auto":"'.$gDat["AutoAbilities"].'", "abil":"'.$gDat["Abilities"].'", "style":'.$gDat["Playstyle"].', "author":"'.
      $gDat["Author"].'","penalties":"'.$gDat["Penalties"].'", "notes":"'.$gDat["Notes"].'", "switch":'.$lDat["Switch"].', "scale":'.$lDat["Scale"].', "vault":'.$lDat["Vault"].', "end":"'.$lDat["EndPos"].'", "assts":'
      .$lDat["ClimbAssts"].'}';
      if($i!==$query->num_rows-1) $data.=",";
  }
  $data.="]";
}else{
  $data = "[]";
}

echo $data;
?>
=======
<?php
header("ContentType: text/plain");
if(isset($_COOKIE["PHPSESSID"])) session_start();
if(session_status()!==2) die();

$dir = "..";
include($dir . "/globals.php");

$servername = "localhost";
$username = "root";
$password = "admin";

$conn = new mysqli($servername, $username, $password, "robotics");

if($conn->connect_error){
  die();
}

//SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='yourdatabasename' AND `TABLE_NAME`='yourtablename';
//use in the future for automated JSON object creation and parsing

$query = $conn->query("select * from Scouting where Competition = \"".$currentComp."\" and Year = ".$currentYear.";");
if(gettype($query)!="boolean"&&isset($_SESSION["perm"])){
  $data = "[";
  for($i=0;$i<$query->num_rows;$i++){
    $gDat = $query->fetch_assoc();
    $lDat = $conn->query("select * from Scouting2018 where ScoutingReport = ".$gDat["ScoutingID"].";")->fetch_assoc();
    $data.='{"team":"'.$gDat["Team"].'", "match":'.$gDat["MatchNumber"].', "start":'.$gDat["StartPos"].', "auto":"'.$gDat["AutoAbilities"].'", "abil":"'.$gDat["Abilities"].'", "style":'.$gDat["Playstyle"].', "author":"'.
      $gDat["Author"].'","penalties":"'.$gDat["Penalties"].'", "notes":"'.$gDat["Notes"].'", "switch":'.$lDat["Switch"].', "scale":'.$lDat["Scale"].', "vault":'.$lDat["Vault"].', "end":"'.$lDat["EndPos"].'", "assts":'
      .$lDat["ClimbAssts"].'}';
      if($i!==$query->num_rows-1) $data.=",";
  }
  $data.="]";
}else{
  $data = "[]";
}

echo $data;
?>
>>>>>>> before discard
