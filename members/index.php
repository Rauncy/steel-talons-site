<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = <?php echo $dir . "/css/members.css"?>>
<script type="text/javascript">
  function reload(type){
    var searchTerm = document.getElementById("search").value;
    var address = "members/index.php?search=" + searchTerm;
    document.cookie ="type="+type;
    window.location = address;
  }
</script>

<body>
<div class="topnav">
  <div class="search-container">
   <form action="" method = "GET">
     <input type="text" id = "search" placeholder="Search.." name="search">
     <br>
     <button type="submit" onclick="reload('user')"><h3>Username</h3></button>
     <button type="submit" onclick="reload('first')"><h3>First Name</h3></button>
     <button type="submit" onclick="reload('last')"><h3>Last Name</h3></button>
   </form>
 </div>
</div>

<?php
// function generateRandomString($length = 10) {
//     return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
// }
//
// $servername = "localhost";
// $username = "root";
// $password = "admin";
// $dbname = "robotics";
//
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
//
// $x =0;
// while($x<=49){
//   $sql = "INSERT INTO members (FirstName, LastName, Username) VALUES('".generateRandomString(6)."','".generateRandomString(12)."','".generateRandomString(18)."');";
//   $result = $conn->query($sql);
//   $x++;
// }
//
//
//
// $conn->close();
?>

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
$searchParam = $_GET["search"];
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
    echo "<table><tr><th>Name</th><th>Grade</th><th>Roles</th><th>Username</th><th>Password</th><th>Email</th><th>Phone Number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["Grade"]."</td><td>".$row["Roles"]."</td><td>".$row["Username"]."</td><td>".$row["Pass"]."</td><td>".$row["Email"].
        "</td><td>(".substr($row["Phone"],0,3).") ".substr($row["Phone"],3,3)." - ".substr($row["Phone"],6,4)."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h1><center>No results</center><h1>";
}
$conn->close();
?>
<div id = "background"><img class = "stretch" src=<?php echo $dir . "/images/membersBackground.jpg"?> alt="image"></div>


</body>

<?php include($dir . "/footer.php") ?>
