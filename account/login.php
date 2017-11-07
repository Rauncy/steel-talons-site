<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<h2><i>Log in</i></h2>
<hr>
<div id="content">
  <form class="infoForm" action="login.php" method="post">
    <center>
      <p class = "formLabel" id = "email">E - Mail: <input type = "text" id = "logInEmail" placeholder="johnappleseed@gmail.com"></p>
      <p class = "formLabel" id = "pass">Password: <input type="password" id="logInPassword" placeholder="******"></p>
      <br>
      <input type="submit" value = "Login" name="submit"></input>
    </center>
    <br>
    <br>
    <a href = "register" class = "flatLink" style = "margin-right:20px;">Register?</a>
    <a href = "recovery" class = "flatLink" style = "margin-left:20px;">Forgot your password?</a>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
