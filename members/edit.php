<?php
header("ContentType: text/plain");
echo (isset($_COOKIE["PHPSESSID"])?"t":"f") . " " . (isset($_POST["user"])?"t":"f") . " ";
if(isset($_COOKIE["PHPSESSID"]) && isset($_POST["user"])){
  session_start();
  if(!isset($_SESSION["perm"]) || ($_SESSION["perm"]<1)) break;
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
      case "name":
        $temp = explode(" ", $_POST["name"]);
        if(isset($temp[0])) $qu.="firstname = ".urldecode($temp[0]).", ";
        if(isset($temp[1])) $qu.="lastname = ".urldecode($temp[1]).", ";
      default:
        $qu.=$key." = ".urldecode($val).", ";
    }
  }
  $qu=substr($qu, 0, strlen($qu)-2);
  $qu.=" where MemberID = ".$_POST["user"].";";
  // echo $qu;
  $conn->query($qu);
  echo "true";
  die();
}
echo "false";
?>
