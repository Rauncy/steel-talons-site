<?php
if(isset($_POST["submit"])){
  switch($_POST["submit"]){
    case "Login":
      if(isset($_POST["loginPassword"])&&isset($_POST["loginEmail"])){
        //Use database for user validation and creation
        $servername = "localhost";
        $username = "root";
        $password = "root";

        $conn = new mysqli($servername, $username, $password, "robotics");

        if($conn->connect_error){
          die();
        }

        $result = $conn->query("select * from members where Email = \"" . $_POST["loginEmail"] . "\" and Pass = \"" . $_POST["loginPassword"] . "\";");
        if($result->num_rows > 0){
          if(session_status()!==2) session_start();

          $data = $result->fetch_assoc();
          $_SESSION["dbid"] = $data["MemberID"];
          $_SESSION["name"] = isset($data["FirstName"])&&isset($data["LastName"]) ? $data["FirstName"] . " " . $data["LastName"] : $data["Username"];
          header("Location: /");
          exit();
        }
      }
      break;
    default:
      break;
  }
}
 ?>
<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "/css/login.css">
<h1 class = "header">Login</h1>
<form class="infoForm" action="login.php" method="post">
  <center>
    <table>
      <tr>
        <td class="formLabel">E-Mail</td>
        <td><input type = "text" name = "loginEmail" placeholder="johnappleseed@gmail.com"></td>
      </tr>
      <tr>
        <td class="formLabel">Password</td>
        <td><input type="password" name="loginPassword" placeholder="******"></td>
      </tr>
    </table>
    <input type="submit" value = "Login" name="submit"></input>
    <p>
      <a href = "register" class = "flatLink" style = "margin-right:10px">Register?</a>
      <a href = "recovery" class = "flatLink" stlye = "margin-left:10px">Forgot your password?</a>
    </p>
  </center>
</form>
<?php include($dir . "/footer.php") ?>
