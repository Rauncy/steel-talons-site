<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<script src = "/js/account.js"></script>
<div id="content">
  <form class="logIn" onsubmit="register();" action="/index.php/register" method="post">
      <p class = "labelLog" id = "email">E - Mail: <input type = "text" id = "registerEmail" placeholder="johnappleseed@gmail.com"></p>
      <p class = "labelLog" >Password: <input type="password" id= "registerPassword" placeholder="******"></p>
      <p class = "labelLog" id = "confirm">Confirm Password: <input type="password" id="confirmPassword" placeholder="******"></p>
      <input type="submit" value = "Register"></input>
      <br>
      <br>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
