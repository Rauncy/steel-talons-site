<?php $dir = ""; include($dir . "/header.php"); ?>
<h1 class = "title">Check In/Out</h1>
<?php if(isset($_COOKIE["PHPSESSID"])){
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  $query = $conn->query("select * from attendance where left is null and user = ".$_SESSION["dbid"].";");
  if($query->num_rows > 0){
    $query = $query->fetch_assoc();
    $date = date("Y-m-d H:i:s");
    $diff = intval($date->format("U")) - intval($query["Arrived"]->format("U"));
    $conn->query("update members set Left = \"".$date."\", TimeSpent = ".$diff." where left is null and user = ".$_SESSION["dbid"].";");
  }else{
    $conn->query("insert into attendance (TimeSpent, Member, Event, Arrived) values (0, ".$_SESSION["dbid"].", \"".$_POST["event"]."\", \"".date("Y-m-d H:i:s")."\")");
  }
}else: ?>
  <center>
    <h2 class="postNotif">You need to be signed in to check in or proceed as a guest</h2>
  </center>
<?php endif; ?>

<?php include($dir . "/footer.php") ?>
