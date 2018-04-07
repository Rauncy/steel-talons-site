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

  $qu = "update members set ";
  for($i = 0; $i<count($_POST); $i++){

  }
  foreach($_POST as $key => $val){
    switch($key){
      case "submit":
        break;
      default:
        $qu.=$key." = ".$val.", ";
    }
  }
  $qu=substr($qu, 0, strlen($qu)-2);
  $conn->query($qu." where id = ".$_POST["id"]);
  echo "true";
}else echo "false";
?>
