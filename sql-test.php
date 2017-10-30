<!DOCTYPE html>
<html>
  <head>
    <title>Test</title>
  </head>
  <body>
    <h1><?php
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error){
      die("Connection Failed: " . $conn->connect_error);
    }
    echo "Connected succesfully under " . $username;
    $conn->query("use robotics");
    $result = $conn->query("select * from members");
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        echo "<br>ID: " . $row["MemberID"] . " Name: " . $row["FirstName"] . " " . $row["LastName"];
      }
    }
    $conn->close();
    ?></h1>
  </body>
</html>
