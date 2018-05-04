<?php $dir = ""; include($dir . "/header.php"); ?>
<h1 class = "title">Check In/Out</h1>
<?php if(isset($_COOKIE["PHPSESSID"])){
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  $query = $conn->query("select * from attendance where user = ".$_SESSION["dbid"]." and left = null;");
}else: ?>
  <center>
    <h2 class="postNotif">You need to be signed in to check in or proceed as a guest</h2>
  </center>
<?php endif; ?>

<?php include($dir . "/footer.php") ?>
