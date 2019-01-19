<?php
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");
  if($conn->connect_error){
    header("Location: /");
    die();
  }
  if(!isset($_GET["u"])){
    $username = $conn->query("select * from members where memberid = ".$_SESSION["dbid"].";")->fetch_assoc()["Username"];
    header("Location: /members/profile?u=".$username);
    die();
  }else{
    //LOAD PROFILE CONTENT
    $member = $conn->query("select * from members where username = ".$_GET["u"].";");
    if($member->num_rows()==0){
      unset($member);
    }else{
      $member = $member->fetch_assoc();
    }
  }
  $dir = "..";
  include($dir . "/header.php");
?>
<?php if(!is_null($member)):?>
  <div id="content">
<?php else:?>

<?php endif; ?>
<?php include($dir . "/footer.php"); ?>
