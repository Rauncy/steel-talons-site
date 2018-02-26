<?php
function register(){
  if(isset($_POST["registerUsername"]) && isset($_POST["registerEmail"])){
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "root";

    $conn = new mysqli($servername, $username, $password, "robotics");

    if($conn->connect_error){
      die();
    }

    $result = $conn->query("select * from members where Username = \"" . $_POST["registerUsername"] . "\" or Email = \"" . $_POST["registerEmail"] . "\";");
    if($result->num_rows == 0){
      $conn->query("insert into members (Username, Email, Pass) values (\"" . $_POST['registerUsername'] . "\", \"" . $_POST['registerEmail'] . "\", \"" . $_POST['registerPassword'] . "\");");
      //Post to login on new acct
      header("Location: /account/login?loginEmail=".$_POST["registerEmail"]."&loginPassword=".$_POST["registerPassword"]."&submit=Login");
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
<link rel = "stylesheet" href = "/css/login.css">
<script src = "/js/account.js"></script>
<h1 class="title">Register</h1>
<form class="infoForm" onsubmit="register();" action="/account/register.php" method="post">
  <center>
    <table>
      <tr>
        <td class = "formLabel">Username:</td>
        <td><input type = "text" id = "registerUsername" name = "registerUsername"></td>
      </tr>
      <tr>
        <td class = "formLabel">Email:</td>
        <td><input type = "text" id = "registerEmail" name = "registerEmail" placeholder="johnappleseed@gmail.com"></td>
      </tr>
      <tr>
        <td class = "formLabel">Password:</td>
        <td><input type="password" id= "registerPassword" name = "registerPassword" placeholder="******"></td>
      </tr>
      <tr>
        <td class = "formLabel">Confirm Password:</td>
        <td><input type="password" id="confirmPassword" name="confirmPassword" placeholder="******"></td>
      </tr>
    </table>
    <input type="submit" value = "Register" name="submit"></input>
  </center>
  <br>
  <br>

</form>
<?php include($dir . "/footer.php") ?>
