<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<h2><i>Log in<i></h2>
<p id = "sub">To access the extensive database and gain key features</p>
<hr>
<div id="content">
  <form class="logIn" action="location.reload()" method="post">
      <p class = "labelLog">E - Mail: <input type = "text" id = "logInEmail" placeholder="johnappleseed@gmail.com"></p>
      <p class = "labelLog" id = "pass">Password: <input type="password" id="logInPassword" placeholder="******"></p>
      <button id = "submit">
        <img src = "../think.png" height = "50"; width="50" style="float:left;margin-right:0.5em">
      </button>
      <br>
      <br>
      <a href = "register" id = "register">Register?</a>
      <a href = "recovery" id = "forgot">Forgot your password?</a>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
