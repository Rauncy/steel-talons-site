<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class = "title">Scouting 2018</h1>
  <span class = "formTitle">General Info</span>
  <table class = "formTable">
    <tr>
      <td>Match Number:</td>
      <td><input type="number" placeholder="Match"></input></td>
    </tr>
    <tr>
      <td>Team Number:</td>
      <td><input type="number" placeholder="Team"></input></td>
    </tr>
  </table>
  <span class = "formTitle">Autonomous</span>
  <table class = "formTable">
    <tr>
      <td>Starting Place</td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
    </tr>
    <tr>
      <td>Abilities</td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
    </tr>
  </table>
  <span class = "formTitle">Teleoperated</span>
  <table class = "formTable">
    <tr>
      <td>Def/Off</td>
      <td><input type="checkbox"></input></td>
      <td><input type="checkbox"></input></td>
    </tr>
    <tr>
      <td>Switch:</td>
      <td><input type="number"></input></td>
    </tr>
    <tr>
      <td>Scale:</td>
      <td><input type="number"></input></td>
    </tr>
    <tr>
      <td>Vault:</td>
      <td><input type="number"></input></td>
    </tr>
  </table>
  <span class = "formTitle">Post Match</span>
  <table class = "formTable">
    <tr>
      <td>End Position</td>
      <td><input type="radio"></td>
      <td><input type="radio"></td>
      <td><input type="radio"></td>
    </tr>
    <tr>
      <td>Robot Climb Assists</td>
      <td><input type="radio"></td>
      <td><input type="radio"></td>
      <td><input type="radio"></td>
    </tr>
  </table>
  <span class = "formTitle">Penalties</span>
  <table class = "formTable">
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
  <span class = "formTitle">Notes</span>
  <input type="text"></input>
  <br><br>
  <input type="submit" value="Log"></input>
</center>

<?php include($dir . "/footer.php") ?>
