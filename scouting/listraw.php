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

if(isset($_GET["year"])) $year = $_GET["year"];
else $year = $currentYear;

if(isset($_GET["competition"])) $competition = $_GET["competition"];
else $competition = $currentComp;

//SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='yourdatabasename' AND `TABLE_NAME`='yourtablename';
//use in the future for automated JSON object creation and parsing
$param = $conn->prepare("select * from Scouting where Competition = ? and Year = ?;");
$param->bind_param("ss", $competition, $year);
$param->execute();
$query = $param->get_result();
$param->close();
if(gettype($query)!="boolean"&&isset($_SESSION["perm"])){
  $data = "[";
  for($i=0;$i<$query->num_rows;$i++){
    //YEAR IS SAFE

    $scoutData = $query->fetch_assoc();

    $param = $conn->prepare("select * from Scouting".$year." where ScoutingReport = ?;");
    $param->bind_param("i", $scoutData["ScoutingID"]);
    $param->execute();
    //Single entry
    $yearData = $param->get_result()->fetch_assoc();
    $param->close();

    $param = $conn->prepare("select * from Abilities where ScoutingReport = ?");
    $param->bind_param("i", $scoutData["ScoutingID"]);
    $param->execute();
    //Multiple entries
    $abilityData = $param->get_result();
    $param->close();

    $param = $conn->prepare("select * from Penalties where ScoutingReport = ?");
    $param->bind_param("i", $scoutData["ScoutingID"]);
    $param->execute();
    //Multiple entries
    $penaltyData = $param->get_result();
    $param->close();

    $data.='{"team":'.$scoutData["Team"].',"match":'.$scoutData["MatchNumber"].',"start":"'.$scoutData["StartPos"].'","end":"'.$scoutData["EndPos"].'","author":"'.(isset($_SESSION["perm"])&&$_SESSION["perm"]<=2?$scoutData["Author"]:"Unavailable").'","notes":"'.$scoutData["Notes"].'", "penalties":[';
    if(gettype($penaltyData)!="boolean"){
      for($j=0;$j<$penaltyData->num_rows;$j++){
        $data.='"'.$penaltyData->fetch_assoc()["Penalty"].'"';
        if($j!==$penaltyData->num_rows-1) $data.=",";
      }
    }

    $autoAbilities = "";
    $abilities = "";
    if(gettype($abilityData)!="boolean"){
      for($j=0;$j<$abilityData->num_rows;$j++){
        $res=$abilityData->fetch_assoc();
        if($res["Auto"]=='1'){
          $autoAbilities.='"'.$res["Ability"].'",';
        }else{
          $abilities.='"'.$res["Ability"].'",';
        }
      }
    }

    $data.='],"abilities":['.substr($abilities,0,strlen($abilities)-1).'],"autoAbilities":['.substr($autoAbilities,0,strlen($autoAbilities)-1).'],';

    //Year data
    $yearText = "";
    foreach ($yearData as $key => $value){
      if($key!="ID"&&$key!="ScoutingReport"){
        $punct=(gettype($value)=="integer"||gettype($value)=="double"?'':'"');
        $yearText.='"'.$key.'":'.$punct.$value.$punct.',';
      }
    }

    $data.=substr($yearText,0,strlen($yearText)-1).'}';
    if($i!==$query->num_rows-1) $data.=",";
  }
  $data.="]";
}else{
  $data = "[]";
}

echo $data;
?>
