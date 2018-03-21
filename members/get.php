<?php
if(isset($_SESSION["perm"])&&$_SESSION["perm"]===0&&isset($_GET["user"])){
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $res = $conn->$query("select * from members where memberid = ".$_GET["user"])->fetch_assoc();
  echo "{fname:\"".$ret["FirstName"]."\", lname:\"".$ret["LastName"]."\", grade:".$ret["Grade"].", year:".$ret["Year"].", roles:\"".$ret["Roles"]."\", perm:".(isset($ret["Permission"])?$ret["Permission"]:"null").
    ", username:\"".$ret["Username"]."\", email:\"".$ret["Email"]."\", picture:\"".$ret["Picture"]."\", desc:\"".$ret["Description"]."\", phone:\"".$ret["Phone"]."\";
}
