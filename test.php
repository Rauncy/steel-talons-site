<?php $dir = ""; include($dir . "/header.php"); ?>
<?php
//Use database for user requests
$servername = "localhost";
$username = "root";
$password = "admin";
$conn = new mysqli($servername, $username, $password, "robotics");

if($conn->connect_error){
  die();
}

$result = $conn->query("select * from members;");
for($i=0;$i<$result->num_lines;$i++){
  
}
?>
<?php include($dir . "/footer.php") ?>
