<?php $dir = ".."; include($dir . "/header.php"); ?>
<h1 class = "title">Editing Member</h1>
<center>
  <?php
  if(!isset($_GET["user"])){
    echo "<h3 class = 'postNotif'>You did not select a user to edit.</h3>";
  }else if(session_status()!==2||!isset($_SESSION["perm"])||$_SESSION["perm"]<0){
    echo "<h3 class = 'postNotif'>You do not have sufficent permissions to access this page</h3>";
  }
  else{
    //Actually do it
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn = new mysqli($servername, $username, $password, "robotics");
    $user = $conn->query("select * from members where memberid = ".$_GET["user"]);
    if(gettype($user)!=="boolean"&&$user->num_rows>0){
      $user = $user->fetch_assoc();
      ?>
      <table class = "formTable">
        <tbody>
          <tr>
            <td class = "tableDataLeft">ID</td>
            <td class = "tableDataRight"><b><?php echo $user["MemberID"];?></b></td>
          </tr>
        </tbody>
      </table>
      <?php
    }else{
      echo "<h3 class = 'postNotif'>This user is invalid. Try a different one.</h3>";
    }
  }
  ?>
</center>
<?php include($dir . "/footer.php") ?>
