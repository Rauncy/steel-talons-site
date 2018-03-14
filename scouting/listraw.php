<?php
header("ContentType: text/plain");
if(isset($_COOKIE["PHPSESSID"])) session_start();
if(session_status()!==2) die();

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

echo $data;
?>
