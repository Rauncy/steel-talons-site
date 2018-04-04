<!--  back end needs to be done-->
<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
function submitScouting(){
  if(session_status()===2){
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $conn = new mysqli($servername, $username, $password, "robotics");
    if($conn->connect_error){
      die();
    }
		$teamNum = $_POST["team"];
		$drive = $_POST["drive"];
		$abilities = trim(preg_replace('/\s+/',' ', $_POST["abilities"]));
    $auto = trim(preg_replace('/\s+/', ' ', $_POST["auto"]));

    // $penalties_dec = bindec($penalties_bin);
    $formData = $conn->query("select TeamID from ScoutingTeams where TeamNumber = ". $teamNum . ";");
    if(gettype($formData)!="boolean"&&$formData->num_rows===0)
    {
			$conn->query("insert into ScoutingTeams (TeamNumber, Abilities, DriveTrain, AutoDesc) values (".$teamNum.", \"".$abilities."\", \"".$drive."\", \"".$auto."\");");
    }
    else {
        $_POST["err"] = 0;
    }
  }
}

if(isset($_POST["submit"])){
  submitScouting();
}
if(isset($_POST["search"])){
	echo("i want to die");
	header("Location: /scouting/team?id=".$_POST["teamSearch"]);
	die();
}

?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class = "title">Scouting 2018</h1>
	<form action="teamScouting" method = "post">
		<input type="number" name = "teamSearch" placeholder="Team Number" required></input>
		<input type="submit" name="search" value="Search" class = "teamScoutingSubmit"></input>
	</form>
  <div class="formContainer">
    <form action="teamScouting" method="post">
      <span class = "formTitle">General Info</span>
      <table class = "formTable">
        <tr>
          <td>Team Number:</td>
          <td><input type="number" name = "team" placeholder="Team" required></input></td>
        </tr>
				<tr>
					<td>Drivetrain: </td>
					<td><input type="text" name = "drive" placeholder="Drivetrain" required></input></td>
				</tr>
			</table>
			<span class = "formTitle">Abilities</span>
      <br>
      <textarea name="abilities" style="resize: none; height: 15em; width: 20em;"></textarea>
			<br>
			<span class = "formTitle">Autonomous Description</span>
      <br>
      <textarea name="auto" style="resize: none; height: 15em; width: 20em;"></textarea>
      <br><br>
      <input type="submit" name="submit" value="Log" class = "teamScoutingSubmit"></input>
    </form>
  </div>
</center>

<?php include($dir . "/footer.php") ?>
