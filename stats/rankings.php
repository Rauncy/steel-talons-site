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
        $ent["matches"]++;
      }else{
        $data[$gDat["Team"]] = array(
          "switch" => $lDat["Switch"],
          "scale" => $lDat["Scale"],
          "vault" => $lDat["Vault"],
          "assts" => $lDat["ClimbAssts"],
          "climb" => ($lDat["EndPos"]==2?1:0),
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
    }

    if(isset($data[$_GET["id"]])){
      $sel = $data[$_GET["id"]];
      $ranks = array(
        "switch" => 1,
        "scale" => 1,
        "vault" => 1,
        "assts" => 1,
        "climb" => 1
      );

      $tieCount = array(
        "switch" => 0,
        "scale" => 0,
        "vault" => 0,
        "assts" => 0,
        "climb" => 0
      );

      foreach($data as $ind){
        if($ind["switch"] > $sel["switch"]) $ranks["switch"]++;
        else if($ind["switch"]==$sel["switch"]) $tieCount["switch"]++;
        if($ind["scale"] > $sel["scale"]) $ranks["scale"]++;
        else if($ind["scale"]==$sel["scale"]) $tieCount["scale"]++;
        if($ind["vault"] > $sel["vault"]) $ranks["vault"]++;
        else if($ind["vault"]==$sel["vault"]) $tieCount["vault"]++;
        if($ind["assts"] > $sel["assts"]) $ranks["assts"]++;
        else if($ind["assts"]==$sel["assts"]) $tieCount["assts"]++;
        if($ind["climb"] > $sel["climb"]) $ranks["climb"]++;
        else if($ind["climb"]==$sel["climb"]) $tieCount["climb"]++;
      }


      echo '{"ranks":{"switch":'.$ranks["switch"].', "scale":'.$ranks["scale"].', "vault":'.$ranks["vault"].', "avg":0, "assts":'.$ranks["assts"].', "climb":'.$ranks["climb"].'}, "ties":{';
      foreach ($tieCount as $k => $v) {
        if($v>0) echo '"'.$k.'":'.$v;
      }
      echo '}}';
    }else{
      echo '{"ranks":{"switch":0, "scale":0, "vault":0, "avg":0, "assts":0, "climb":0}, "ties":{}}';
    }
  }
}else{
  echo "{}";
}
?>
