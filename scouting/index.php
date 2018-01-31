<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet" href = "/css/scouting.css">
<form class="scouting" action="index.php" method="post">
<center>
	<table>
		<tr>
			<td class = "formLabel">Shooting:</td>
			<td><input type="checkbox" name = "shooting" value="fast">Fast <input type="checkbox" name = "shooting" value="accurate">Accurate</td>
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
			<td><input type="text" name="Climb" value=""></td>
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
			<td class = "formLabel">Mechanical Errorr: </td>
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
	<h3 class = "formTitle">Penalties</h3>
	<table>
		<tr>
			<td class = "formLabel">Foul</td>
			<td><input  type="checkbox" name = "penalties" value="Foul"></td>
		</tr>
		<tr>
			<td class = "formLabel">Tech Foul</td>
			<td><input  type="checkbox" name = "penalties" value="Tech Foul"></td>
		</tr>
		<tr>
			<td class = "formLabel">Yellow Card</td>
			<td><input  type="checkbox" name = "penalties" value="Yellow Card"></td>
		</tr>
		<tr>
			<td class = "formLabel">Red Card</td>
			<td><input  type="checkbox" name = "penalties" value="Red Card"></td>
		</tr>
		<tr>
			<td class = "formLabel">Disabled</td>
			<td><input  type="checkbox" name = "penalties" value="Disabled"></td>
		</tr>
		<tr>
			<td class = "formLabel">Disqualified</td>
			<td><input type="checkbox" name = "penalties" value="Disqualified"></td>
		</tr>
	</table>
<center>
  <input type="submit" name="scouting" value="Submit">

</form>
