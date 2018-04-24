<?php $dir = ".."; $headerData = '<link rel = "stylesheet"  href = "'. $dir . '/css/members.css">
<div id="memberBox">
<input type="text" name="name" placeholder="Name" class="memberBoxField">
<input type="text" name="grade" placeholder="Grade" class="memberBoxField">
<input type="text" name="roles" placeholder="Roles" class="memberBoxField">
<input type="text" name="username" placeholder="Username" class="memberBoxField">
<input type="text" name="email" placeholder="E-Mail" class="memberBoxField">
</div>'; include($dir . "/header.php"); ?>
<script type="text/javascript" src="<?php echo $dir . "/js/members.js"?>">
</script>

<body>
<button onclick="toggleMemberTab()">Henlo</button>
<?php
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
    echo "<table class><tr><th>Name</th><th>Grade</th><th>Roles</th><th>Username</th><th>Email</th><th>Phone Number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><a onclick = 'loadMemberTab(".$row["MemberID"].")'>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["Grade"]."</td><td>".$row["Roles"]."</td><td>".$row["Username"]."</td><td>".$row["Email"].
        "</td><td>(".substr($row["Phone"],0,3).") ".substr($row["Phone"],3,3)." - ".substr($row["Phone"],6,4)."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h1><center>No results</center><h1>";
}
$conn->close();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h1>TEST</h1>

</body>

<?php include($dir . "/footer.php") ?>
