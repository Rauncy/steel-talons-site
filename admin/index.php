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

    $total = 0;
    $removed = $conn->query("select * from scouting where competition = \"".$currentComp."\" and year = ".$currentYear." and MatchNumber = ".$_POST["scoutingmatchresetid"].";");
    $conn->query("delete from scouting where competition = \"".$currentComp."\" and year = ".$currentYear." and MatchNumber = ".$_POST["scoutingmatchresetid"].";");
    if(gettype($removed)!="boolean"&&$removed->num_rows>0){
      foreach($removed as $trem){
        $conn->query("delete from scouting".$currentYear." where scoutingreport = ".$trem["ScoutingID"].";");
        $conn->query("delete from abilities where scoutingreport = ".$trem["ScoutingID"].";");
        $conn->query("delete from penalties where scoutingreport = ".$trem["ScoutingID"].";");
        $total++;
      }
    }
  }?>
  <span class="subcategoryTitle">Scouting</span>
  <br><br>
  <form method = "post">
    <?php if(isset($_POST["scoutingmatchresetid"])):?>
      <h2 class="postNotif"><?php echo $total; ?> entries removed</h2>
    <?php endif; ?>
    <input type="number" name="scoutingmatchresetid" placeholder="Reset scouting data for match" style="width: 195px;">
  </form>
  <br><br>
  <span class="subcategoryTitle">Members</span>
  <br><br>
  <?php
    if(isset($_POST["memberresetpassword"]) && isset($_POST["memberresetusername"])){
      $servername = "localhost";
      $username = "root";
      $password = "admin";
      $conn = new mysqli($servername, $username, $password, "robotics");
      if($conn->connect_error){
        die();
      }
      $npass = sha1($_POST["memberresetpassword"].$passSalt);
      $param = $conn->prepare("update members set pass= ? where username = ?;");
      $param->bind_param("ss", $npass, $_POST["memberresetusername"]);
      $param->execute();
      $param->close();
    }
  ?>
  <span class="subtitle">Reset Password</span>
  <form method = "post">
    <?php if(isset($_POST["memberresetpassword"])):?>
      <h2 class="postNotif">Password changed</h2>
    <?php endif; ?>
    <input type="text" name="memberresetusername" placeholder="Username" style="width: 195px;">
    <input type="password" name="memberresetpassword" placeholder="New Password" style="width: 195px;">
    <input type="submit">
  </form>
</center>
<?php include($dir . "/footer.php") ?>
