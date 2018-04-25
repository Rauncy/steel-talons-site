<?php
header("ContentType: text/plain");
echo (isset($_COOKIE["PHPSESSID"])?"t":"f")." ".(isset($_POST["user"])?"t":"f")." ".(isset($_SESSION["perm"])?"t":"f");
if(isset($_COOKIE["PHPSESSID"]) && isset($_POST["user"]) && isset($_SESSION["perm"])){
  //edit
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $qu = "update members set ";
  foreach($_POST as $key => $val){
    switch($key){
      case "submit":
      case "user":
        break;
      default:
        $qu.=$key." = ".$val.", ";
    }
  }
  $qu=substr($qu, 0, strlen($qu)-2);
  $qu.=" where MemberID = ".$_POST["user"];
  echo $qu."<br>";
  $conn->query($qu);
  echo "true";
}else echo "false";
?>
