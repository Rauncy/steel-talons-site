<?php
header("ContentType: text/plain");
if(isset($_COOKIE["PHPSESSID"]) && isset($_POST["submit"]) && isset($_SESSION["perm"])){
  //edit
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $conn->query("update members set ".""." where id = ".$_POST["id"]);
}else echo "false";
?>
