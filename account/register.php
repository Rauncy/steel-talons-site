<?php
function register(){
  if(isset($_POST["registerUsername"]) && isset($_POST["registerEmail"])){
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn = new mysqli($servername, $username, $password, "robotics");

    if($conn->connect_error){
      die();
    }

    $result = $conn->query("select * from members where Username = \"" . $_POST["registerUsername"] . "\" or Email = \"" . $_POST["registerEmail"] . "\";");
    if($result->num_rows == 0){
      $conn->query("insert into members (Username, Email, Pass) values (\"" . $_POST["registerUsername"] ."\", \"" . $_POST["registerEmail"] . "\", \"" . $_POST["registerPassword"] . "\");");
    }
  }
}

if(isset($_POST["registerUsername"])){
  switch($_POST["submit"]){
    case "Register": register(); break;
    default: $message = $_POST["submit"]; break;
  }
}
?>
<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<script src = "/js/account.js"></script>
<div id="content">
  <form class="infoForm" onsubmit="register();" action="/account/register.php" method="post">
    <p class = "formLabel" id = "username">Username: <input type = "text" id = "registerUsername" name = "registerUsername"></p>
    <p class = "formLabel" id = "email">E - Mail: <input type = "text" id = "registerEmail" name = "registerEmail" placeholder="johnappleseed@gmail.com"></p>
    <p class = "formLabel" >Password: <input type="password" id= "registerPassword" name = "registerPassword" placeholder="******"></p>
    <p class = "formLabel" id = "confirm">Confirm Password: <input type="password" id="confirmPassword" name="confirmPassword" placeholder="******"></p>
    <input type="submit" value = "Register" name="submit"></input>
    <br>
    <br>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
