<?php
function register(){

}

function login($email, $pass){
  //Use database for user validation and creation
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  $result = $conn->query("select * from members where Email = \"" . $email . "\" and Pass = \"" . $pass . "\";");
  if($result->num_rows > 0){
    if(session_status()!==2){
      session_start();
    }

    $data = $result->fetch_assoc();
    $_SESSION["dbid"] = $data["MemberID"];
    $_SESSION["name"] = isset($data["FirstName"])&&isset($data["LastName"]) ? $data["FirstName"] . " " . $data["LastName"] : $data["Username"];
    $_SESSION["perm"] = isset($data["Permission"]) ? $data["Permission"] : 100;
    header("Location: /");
    exit();
  }
}

if(isset($_POST["submit"])){
  switch($_POST["submit"]){
    case "Login":
      if(isset($_POST["loginPassword"])&&isset($_POST["loginEmail"])){
        login($_POST["loginEmail"], $_POST["loginPassword"]);
      }
      break;
    case "Register":
      if(isset($_POST["registerUsername"]) && isset($_POST["registerEmail"])){
        //Use database for user validation and creation
        $servername = "localhost";
        $username = "root";
        $password = "root";

        $conn = new mysqli($servername, $username, $password, "robotics");

        if($conn->connect_error){
          die();
        }

        $result = $conn->query("select * from members where Username = \"" . $_POST["registerUsername"] . "\" or Email = \"" . $_POST["registerEmail"] . "\";");
        if($result->num_rows == 0){
          $conn->query("insert into members (Username, Email, Pass) values (\"" . $_POST['registerUsername'] . "\", \"" . $_POST['registerEmail'] . "\", \"" . $_POST['registerPassword'] . "\");");
          login($_POST["registerEmail"], $_POST["registerPassword"]);
          header("Location: /");
        }else{

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
