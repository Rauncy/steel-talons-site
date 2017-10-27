<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<div id="content">
  <form class="logIn" method="post">
      <p class = "labelLog" id = "email">E - Mail: <input type = "text" id = "registerEmail" placeholder="johnappleseed@gmail.com"></p>
      <p class = "labelLog" >Password: <input type="password" id= "registerPassword" placeholder="******"></p>
      <p class = "labelLog" id = "confirm">Confirm Password: <input type="password" id="confirmPassword" placeholder="******"></p>
      <button id = "submit" onclick = "register()">
        <img src = "https://openclipart.org/image/800px/svg_to_png/191072/Blue-Robot.png" height = "50"; width="50" style="float:left;margin-right:0.5em">
      </button>
      <br>
      <br>

  </form>
</div>
<?php include($dir . "/footer.php") ?>
