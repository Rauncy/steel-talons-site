<?php
header("ContentType: text/plain");
$dir = "..";
include($dir . "/globals.php");

if(isset($_GET["id"])){
  $data = [];

  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $query = $conn->query("select * from Scouting where Competition = \"".$currentComp."\" and Year = ".$currentYear.";");

  if(gettype($query)!="boolean"){
    for($i=0;$i<$query->num_rows;$i++){
      $gDat = $query->fetch_assoc();
      $lDat = $conn->query("select * from Scouting2018 where ScoutingReport = ".$gDat["ScoutingID"].";")->fetch_assoc();
      if(isset($data[$gDat["Team"]])){
        $ent = $data[$gDat["Team"]];
        $ent["switch"] += $lDat["Switch"];
        $ent["scale"] += $lDat["Scale"];
        $ent["vault"] += $lDat["Vault"];
        $ent["assts"] += $lDat["ClimbAssts"];
        $ent["climb"] += ($lDat["EndPos"]==2?1:0);
        $ent["matches"] += 1;
        $data[$gDat["Team"]] = $ent;
      }else{
        $data[$gDat["Team"]] = array(
          "team" => intval($gDat["Team"]),
          "switch" => floatval($lDat["Switch"]),
          "scale" => floatval($lDat["Scale"]),
          "vault" => floatval($lDat["Vault"]),
          "assts" => floatval($lDat["ClimbAssts"]),
          "climb" => ($lDat["EndPos"]==2?1.0:0.0),
          "matches" => 1
        );
      }
    }

    foreach($data as $ind){
      $ind["switch"] /= $ind["matches"];
      $ind["scale"] /= $ind["matches"];
      $ind["vault"] /= $ind["matches"];
      $ind["assts"] /= $ind["matches"];
      $ind["climb"] /= $ind["matches"];
      if($ind["team"] == $_GET["id"]) var_dump($ind);
      $data[$ind["team"]]=$ind;
    }

    if(isset($data[$_GET["id"]])){

      $res = array();
      foreach($data as $ind){
        $res[$ind["team"]] = $ind["scale"];
      }
      arsort($res);
      var_dump($res);
    }else{
      echo '{"switch":"No Data", "scale":"No Data", "vault":"No Data", "climb":"No Data", "assts":"No Data"}';
    }
  }
}else{
  echo "{}";
}
?>
