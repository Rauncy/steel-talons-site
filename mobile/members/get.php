<?php
header("ContentType: text/plain");
if(isset($_COOKIE["PHPSESSID"])) session_start();
else{
  echo "No session specified";
  die();
}
if(session_status()!==2) die();
if(isset($_SESSION["perm"])&&$_SESSION["perm"]==0&&isset($_GET["user"])){
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $res = $conn->query("select * from members where memberid = ".$_GET["user"])->fetch_assoc();
  echo "{fname:\"".$res["FirstName"]."\", lname:\"".$res["LastName"]."\", grade:".$res["Grade"].", year:".$res["Year"].", roles:\"".$res["Roles"]."\", perm:".(isset($res["Permission"])?$res["Permission"]:"null").
    ", username:\"".$res["Username"]."\", email:\"".$res["Email"]."\", picture:\"".$res["Picture"]."\", desc:\"".$res["Description"]."\", phone:\"".$res["Phone"]."\"}";
}else{
  if(!isset($_GET["user"])) echo "User not specified";
  else if(!isset($_SESSION["perm"])) echo "No permission specified";
  else echo "Incorrect permission to view data";
}
?>
