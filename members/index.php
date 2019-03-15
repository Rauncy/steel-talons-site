<?php $dir = ".."; $headerData = '<link rel = "stylesheet"  href = "'. $dir . '/css/members.css">
<div id="memberBox">
<form onsubmit="return saveMemberTab()">
<span class="memberBoxHeader"></span>
<input type="text" name="firstname" placeholder="First Name" class="memberBoxElement">
<input type="text" name="lastname" placeholder="Last Name" class="memberBoxElement">
<input type="number" name="grade" placeholder="Grade" class="memberBoxElement">
<input type="text" name="roles" placeholder="Roles" class="memberBoxElement">
<input type="text" name="username" placeholder="Username" class="memberBoxElement">
<input type="text" name="email" placeholder="E-Mail" class="memberBoxElement">
<input type="text" name="permission" placeholder="Permission" class="memberBoxElement">
<span class="memberBoxHeader"></span>
<button class="memberBoxElement" onclick="closeMemberTab()">Close Sidebar</button>
<button class="memberBoxElement" onclick="saveMemberTab()">Submit Changes</button>
</form>
</div>'; include($dir . "/header.php"); ?>
<script type="text/javascript" src="<?php echo $dir . "/js/members.js"?>">
</script>

<body>
<?php
if(isset($_SESSION["perm"]) && $_SESSION["perm"]<=1){
  $servername = "localhost";
  $username = "root";
  $password = "admin";
  $dbname = "robotics";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $searchParam = (isset($_GET["search"])?$_GET["search"]:"");
  if ( ! empty( $_COOKIE['type'] ) ){
    $type = $_COOKIE["type"];
  }
  else{
    $type = "user";
  }
  if($searchParam == "") {
    $sql = "SELECT * FROM Members";
  }
  else {
    if($type=="user"){
      $sql = "SELECT * FROM Members WHERE Username LIKE '%".$searchParam."%'";
    }
    if($type=="first"){
      $sql = "SELECT * FROM Members WHERE FirstName LIKE '%".$searchParam."%'";
    }
    if($type=="last"){
      $sql = "SELECT * FROM Members WHERE LastName LIKE '%".$searchParam."%'";
    }
  }
  $result = $conn->query($sql);
  // echo $result;
  if ($result->num_rows > 0) {
      echo "<table class><tr><th>Name</th><th>Grade</th><th>Roles</th><th>Username</th><th>Email</th><th>Phone Number</th><th>Permission</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr onclick = 'loadMemberTab(".$row["MemberID"].")'><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["Grade"]."</td><td>".$row["Roles"]."</td><td>".$row["Username"]."</td><td>".$row["Email"].
          "</td><td>(".substr($row["Phone"],0,3).") ".substr($row["Phone"],3,3)." - ".substr($row["Phone"],6,4)."</td><td>".$row["Permission"]."</td></tr>";
      }
      echo "</table>";
  } else {
      echo "<h1><center>No results</center><h1>";
  }
  $conn->close();
}else{
  echo "<h1 class='title error'><center>Insufficient permissions</center></h1>";
}
?>

</body>

<?php include($dir . "/footer.php") ?>
