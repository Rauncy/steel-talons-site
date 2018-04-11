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
      $data[$ind["team"]]=$ind;
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
        if($ind["team"]==$_GET["id"]) continue;

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

//       echo '{"switch":"'.($tieCount["switch"]>0?$tieCount["switch"]+1 ." way tie for ":"").$ranks["switch"].'", "scale":"'.($tieCount["scale"]>0?$tieCount["scale"]+1 ." way tie for ":"").$ranks["scale"].'", "vault":"'.
//         ($tieCount["vault"]>0?$tieCount["vault"]+1 ." way tie for ":"").$ranks["vault"].'", "assts":"'.($tieCount["assts"]>0?$tieCount["assts"]+1 ." way tie for ":"").$ranks["assts"].'", "climb":"'.
//         ($tieCount["climb"]>0?$tieCount["climb"]+1 ." way tie for ":"").$ranks["climb"].'"}';
      echo '{"ranks":{"switch":'.$ranks["switch"].', "scale":'.$ranks["scale"].', "vault":'.$ranks["vault"].', "assts":'.$ranks["assts"].', "climb":'.$ranks["climb"].'},
        "ties":{'.($tieCount["switch"]>0?'"switch":'.$tieCount["switch"].', ':"").($tieCount["scale"]>0?'"scale":'.$tieCount["scale"].', ':"").($tieCount["vault"]>0?'"vault":'.$tieCount["vault"].', ':"").
        ($tieCount["assts"]>0?'"assts":'.$tieCount["assts"].', ':"").($tieCount["climb"]>0?'"climb":'.$tieCount["climb"]:"").'}}';
    }else{
      echo '{"switch":"No Data", "scale":"No Data", "vault":"No Data", "climb":"No Data", "assts":"No Data"}';
    }
  }
}else{
  echo "{}";
}
?>
