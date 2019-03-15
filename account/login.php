<?php $dir = ".."; include($dir . "/header.php");?>
<?php
$GLOBALS["salt"] = "FRCTeam5427";
function login($user, $pass){
  //Use database for user validation and creation
  // echo "log ";
  $servername = "localhost";
  $username = "root";
  $password = "admin";

  $conn = new mysqli($servername, $username, $password, "robotics");

  if($conn->connect_error){
    die();
  }

  // echo("select * from members where Username = \"" . $user . "\" and Pass = \"" . sha1($pass.$GLOBALS["salt"]) . "\";" . " \"" . $pass . "\" \"" . $salt . "\" \"" . sha1($pass.$GLOBALS["salt"]) . "\"");
  $result = $conn->query("select * from members where Username = \"" . $user . "\" and Pass = \"" . sha1($pass.$GLOBALS["salt"]) . "\";");
  if($result->num_rows > 0){
    // echo "acc ";
    if(session_status()!==2){
      session_start();
    }

    $data = $result->fetch_assoc();
    $_SESSION["dbid"] = $data["MemberID"];
    $_SESSION["name"] = isset($data["FirstName"])&&isset($data["LastName"]) ? $data["FirstName"] . " " . $data["LastName"] : $data["Username"];
    $_SESSION["perm"] = isset($data["Permission"]) ? $data["Permission"] : 100;
    header("Location: /");
    die();
  }else{
    // echo "unacc ";
    header("Location: /account/login?err=0");
  }
}

if(isset($_POST["submit"])){
  switch($_POST["submit"]){
    case "Login":
      // echo "Log";
      if(isset($_POST["loginPassword"])&&isset($_POST["loginEmail"])){
        login($_POST["loginEmail"], $_POST["loginPassword"]);
      }
      break;
    case "Register":
      // echo "Reg";
      if(isset($_POST["registerUsername"]) && isset($_POST["registerPassword"])){
        //Use database for user validation and creation
        // echo "reg ";
        $servername = "localhost";
        $username = "root";
        $password = "admin";

        $conn = new mysqli($servername, $username, $password, "robotics");

        if($conn->connect_error){
          header("Location: /account/register?err=1");
          die();
        }
        // echo "nerr ";

        $result = $conn->query("select * from members where Username = \"" . $_POST["registerUsername"] . "\" or Email = \"" . $_POST["registerEmail"] . "\";");
        if($result->num_rows == 0){
          // echo "nsel ";
          // echo "\"" . $_POST['registerPassword'] . "\" \"" . $salt . "\" \"" . sha1($_POST['registerPassword'].$salt . "\"");
          $conn->query("insert into members (Permission, FirstName, LastName, Grade, Roles, Phone, Username, Email, Pass) values (100, \"".$_POST['registerFirstName']."\", \"".$_POST['registerLastName']."\", \"".$_POST['registerGrade']."\", \"".$_POST['registerRole']."\", \"".$_POST['phone-1'].$_POST['phone-2'].$_POST['phone-3'].
          "\", \"".$_POST['registerUsername'] . "\", \"" . $_POST['registerEmail'] . "\", \"" . sha1($_POST['registerPassword'].$GLOBALS["salt"]) . "\");");
          // echo "insert into members (FirstName, LastName, Grade, Roles, Phone, Username, Email, Pass) values (\"".$_POST['registerFirstName']."\", \"".$_POST['registerLastName']."\", \"".$_POST['registerGrade']."\", \"".$_POST['registerRole']."\", \"".$_POST['phone-1'].$_POST['phone-2'].$_POST['phone-3'].
          // "\", \"".$_POST['registerUsername'] . "\", \"" . $_POST['registerEmail'] . "\", \"" . sha1($_POST['registerPassword'].$GLOBALS["salt"]) . "\");";
          login($_POST["registerUsername"], $_POST["registerPassword"]);
          // echo "<script>alert('processed, result is: '".$quer.")</script>";
        }else{
            // echo "sel ";
            header("Location: /account/register?err=0");
            die();
        }
      }
      break;
    default:
      break;
  }
}
?>
<link rel = "stylesheet"  href = "/css/login.css">
<h1 class = "title">Login</h1>
<?php if(isset($_GET["err"])){
  echo "<h2 class='postNotif'><center>";
  switch($_GET["err"]){
    case 0:
      echo "Your username or password is incorrect";
      break;
    default:
      echo "An unknown error occured";
  }
  echo "</center></h2>";
}?>
<form class="infoForm" action="login" method="post">
  <center>
    <table>
      <tr>
        <td class="formLabel">Username</td>
        <td><input type = "text" name = "loginEmail" placeholder="johnappleseed"></td>
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
