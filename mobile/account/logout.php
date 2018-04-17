<?php
if(isset($_COOKIE["PHPSESSID"])){
  session_destroy();
  setcookie("PHPSESSID", null, -1, "/");
}
header("Location: /");
?>
