<?php if(isset($_COOKIE["PHPSESSID"])){
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  $conn->query("select * from members;");

  $ret = "{";

  $ret .= "}";
  echo $ret;
}
