<?php $dir = ".."; include($dir . "/header.php"); include($dir . "/globals.php");?>
<link rel = "stylesheet" href = "/css/admin.css">
<h1 class="title">Administration</h1>
<center>
  <?php if(isset($_POST["scoutingmatchresetid"])){
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $conn = new mysqli($servername, $username, $password, "robotics");
    if($conn->connect_error){
      die();
    }

    $conn->query("delete from scouting where competition = ");
  }?>
  <span class="subcategoryTitle">Scouting</span>
  <br><br>
  <form method = "post">
    <input type="number" name="scoutingmatchresetid" placeholder="Reset scouting data for match" style="width: 195px;">
  </form>
</center>
<?php include($dir . "/footer.php") ?>
