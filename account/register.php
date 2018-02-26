<?php
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
<form class="infoForm" onsubmit="register();" action="/account/login.php" method="post">
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
