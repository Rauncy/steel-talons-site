<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
if(isset($_POST["submit"])){
  switch($_POST["submit"]){
    case "Login":
      if(isset($_POST["loginPassword"])&&isset($_POST["loginEmail"])){
        //Use database for user validation and creation
        $servername = "localhost";
        $username = "root";
        $password = "admin";

        $conn = new mysqli($servername, $username, $password, "robotics");

        if($conn->connect_error){
          die();
        }

				$result = $conn->query("insert into Scouting (\"Team\",\"Author\",\"Timestamp\",\"Competition\",\"MatchNumber\",\"AutoAbilities\",\"Abilities\") values (\"" . $_POST["TeamNumber"] . "\", \"" . $_SESSION["sqlid"] . "\", \"yes\", \"no\", \"" . $_POST["MatchNumber"]
				. "\",");
        $result = $conn->query("insert into Scouting2017 (\"ScoutingReport\",\"Shooting\",\"GearsDelivered\",\"GearsGathered\",\"Climb\",\"HumanPlayer\",\"Penalties\",\"DriverAbility\",\"MechanicalError\",\"ClimbingDifficulties\",\"Defense\") values (\"" . $_POST["TeamNumber"] . "\", \"" . $_POST["Competition"] . "\", \"" . $_POST["Competition"] . "\";");
        if($result->num_rows > 0){
          if(!session_id()) session_start();
        }
      }
      break;
    default:
      break;
  }
}
 ?>
<link rel = "stylesheet" href = "/css/scouting.css">
<form class="scouting" action="index.php" method="post">
<center>
	<span class = "formTitle">Scouting 2017</span>
	<table style = "border: 2px solid black; padding: 4px;">
		<tr>
			<td class = "formLabel">Team Number: </td>
			<td><input type="text" name="TeamNumber" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Competition: </td>
			<td><input type="text" name="Competition" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Match Number: </td>
			<td><input type="text" name="MatchNumber" value=""></td>
		</tr>
	</table>
	<span class = "formTitle">Autonomous</span>
	<table style = "border: 2px solid black; padding: 4px;">
		<tr>
			<td class = "formLabel">Position: </td>
			<td><input type="checkbox" name = "AutoLeft" value="left">Left <input type="checkbox" name = "AutoMiddle" value="middle">Middle <input type="checkbox" name = "AutoRight" value="right">Right </td>
		</tr>
		<tr>
			<td class = "formLabel">Baseline: </td>
			<td><input type="radio" name = "AutoBase" value="autobaseline"></td>
		</tr>
		<tr>
			<td class = "formLabel">Gear: </td>
			<td><input type="radio" name = "AutoGear" value="autogear"></td>
		</tr>
		<tr>
			<td class = "formLabel">Shooting: </td>
			<td><input type="radio" name = "AutoShoot" value="autoshoot"></td>
		</tr>
	</table>
	<span class = "formTitle">General</span>
	<table style = "border: 2px solid black; padding: 4px;">
		<tr>
			<td class = "formLabel">Shooting:</td>
			<td><input type="checkbox" name = "ShootingFast" value="fast">Fast <input type="checkbox" name = "ShootingAccurate" value="accurate">Accurate</td>
		</tr>
		<tr>
			<td class = "formLabel">Gears Delivered: </td>
			<td><input type="text" name="GearsDelivered" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Gears Gathered: </td>
			<td><input type="text" name="GearsGathered" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Climb: </td>
			<td><input type="radio" name="Climb" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Human Player: </td>
			<td><input type="text" name="HumanPlayer" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Driver Ability: </td>
			<td><input type="text" name="DriverAbility" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Mechanical Error: </td>
			<td><input type="text" name="MechanicalError" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Climbing Dificulties: </td>
			<td><input type="text" name="ClimbingDificulties" value=""></td>
		</tr>
		<tr>
			<td class = "formLabel">Defense: </td>
			<td><input type="text" name="Defense" value=""></td>
		</tr>
	</table>
	<span class = "formTitle">Penalties</span>
	<table style = "border: 2px solid black; padding: 4px;">
		<tr>
			<td class = "formLabel">Foul</td>
			<td><input  type="checkbox" name = "PenaltiesFoul" value="Foul"></td>
		</tr>
		<tr>
			<td class = "formLabel">Tech Foul</td>
			<td><input  type="checkbox" name = "PenaltiesTech" value="Tech Foul"></td>
		</tr>
		<tr>
			<td class = "formLabel">Yellow Card</td>
			<td><input  type="checkbox" name = "PenaltiesYellow" value="Yellow Card"></td>
		</tr>
		<tr>
			<td class = "formLabel">Red Card</td>
			<td><input  type="checkbox" name = "PenaltiesRed" value="Red Card"></td>
		</tr>
		<tr>
			<td class = "formLabel">Disabled</td>
			<td><input  type="checkbox" name = "PenaltiesDisabled" value="Disabled"></td>
		</tr>
		<tr>
			<td class = "formLabel">Disqualified</td>
			<td><input type="checkbox" name = "PenaltiesDisqualified" value="Disqualified"></td>
		</tr>
	</table>
	<br>
<center>
  <input type="submit" name="Scouting" value="Submit">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</form>
