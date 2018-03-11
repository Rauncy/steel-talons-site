<?php $dir = ".."; include($dir . "/header.php"); ?>
<h1 style="text-align: center; padding: .5em;">Scouting Database</h1>

<style media="screen">
th,td{
  display: table-cell;
  border: 1px solid navy;
  max-width: 3.125em;
}
td{
  text-align: center;
  overflow: auto;
  height: 70px;
}
</style>
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

$sql = "SELECT * FROM scouting";

$result = $conn->query($sql);
// echo $result;
if ($result->num_rows > 0) {
    echo "<table style = 'width: 100%;'><tr><th>FormID</th><th>Match Number</th><th>Team Number</th><th>Start Position</th><th>Abilities</th><th>Strategy</th><th>Switch</th><th>Scale</th><th>Vault</th><th>End Position</th><th>Climb Assist</th><th>Penalties</th><th>Notes</th><th>MemberID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["formID"]."</td><td>".$row["matchNumber"]."</td><td>".$row["teamNumber"]."</td><td>".$row["startPos"]."</td><td>".$row["abilities"]."</td><td>".$row["strategy"]."</td><td>".$row["switch"]."</td><td>".$row["scale"]
        ."</td><td>".$row["vault"]."</td><td>".$row["endPos"]."</td><td>".$row["climbAsst"]."</td><td>".$row["penalties"]."</td><td>".$row["notes"]."</td><td>".$row["memberID"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h1><center>No results</center><h1>";
}
$conn->close();
 ?>
