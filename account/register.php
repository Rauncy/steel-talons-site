<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
function register(){
  if(isset($_POST["registerUsername"]) && isset($_POST["registerEmail"])){
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn = new mysqli($servername, $username, $password, "robotics");

    $result = $conn->query("select * from members where Username = '" . $_POST["registerUsername"] . "' or Email = '" . $_POST["registerEmail"] . "';");
    if($result->$num_rows === 0){
      $conn->query("insert into members (Username, Email, Password) values ('" . $_POST["registerUsername"] ."', '" . $_POST["registerEmail"] . "', '" . $_POST["registerPassword"] . "');");
    }
  }
}
if(isset($_POST["submit"])){
  switch($_POST["submit"]=="Register"){
    register();
  }
}
?>
<link rel = "stylesheet"  href = "/css/login.css">
<script src = "/js/account.js"></script>
<div id="content">
  <form class="logIn" onsubmit="register();" action="/index.php/register" method="post">
    <p class = "labelLog" id = "username">Username: <input type = "text" id = "registerUsername"></p>
    <p class = "labelLog" id = "email">E - Mail: <input type = "text" id = "registerEmail" placeholder="johnappleseed@gmail.com"></p>
    <p class = "labelLog" >Password: <input type="password" id= "registerPassword" placeholder="******"></p>
    <p class = "labelLog" id = "confirm">Confirm Password: <input type="password" id="confirmPassword" placeholder="******"></p>
    <input type="submit" value = "Register"></input>
    <br>
    <br>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
