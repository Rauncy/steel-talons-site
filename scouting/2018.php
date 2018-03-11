<!--  back end needs to be done-->
<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
function submitScouting(){
  echo "<table style='position: absolute; top: 200px;'>
    <thead>
      <tr>
        <th>Variable Name</th>
        <th>Result</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Match</td>
        <td>".$_POST["match"]."</td>
      </tr>
      <tr>
        <td>Team</td>
        <td>".$_POST["team"]."</td>
      </tr>
      <tr>
        <td>Starting</td>
        <td>".$_POST["startPos"]."</td>
      </tr>
      <tr>
        <td>Abilities</td>
        <td>".(isset($_POST["abilitiesBL"])?1:0)."|".(isset($_POST["abilitiesSW"])?1:0)."|".(isset($_POST["abilitiesSC"])?1:0)."|".(isset($_POST["abilitiesPI"])?1:0)."</td>
      </tr>
      <tr>
        <td>Type</td>
        <td>".(isset($_POST["type"])?$_POST["type"]:"non")."</td>
      </tr>
      <tr>
        <td>Switch</td>
        <td>".$_POST["switch"]."</td>
      </tr>
      <tr>
        <td>Scale</td>
        <td>".$_POST["scale"]."</td>
      </tr>
      <tr>
        <td>Vault</td>
        <td>".$_POST["vault"]."</td>
      </tr>
      <tr>
        <td>End Pos</td>
        <td>".$_POST["endPos"]."</td>
      </tr>
      <tr>
        <td>Climb Asst</td>
        <td>".$_POST["climbAsst"]."</td>
      </tr>
      <tr>
        <td>Penalties</td>
        <td>".(isset($_POST["PenaltiesFoul"])?1:0)."|".(isset($_POST["PenaltiesTech"])?1:0)."|".(isset($_POST["PenaltiesYellow"])?1:0)."|".(isset($_POST["PenaltiesRed"])?1:0)."|".
        (isset($_POST["PenaltiesDisabled"])?1:0)."|".(isset($_POST["PenaltiesDisqualified"])?1:0)."</td>
      </tr>
      <tr>
        <td>Notes</td>
        <td>".(isset($_POST["notes"])?$_POST["notes"]:"None")."</td>
      </tr>
    </tbody>
  </table>";
}

if(isset($_POST["submit"])){
  //test if all post parameters are set
  submitScouting();
}
?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class = "title">Scouting 2018</h1>
  <div class="formContainer">
    <form action="2018" method="post">
      <span class = "formTitle">General Info</span>
      <table class = "formTable">
        <tr>
          <td>Match Number:</td>
          <td><input type="number" name = "match" placeholder="Match" required></input></td>
        </tr>
        <tr>
          <td>Team Number:</td>
          <td><input type="number" name = "team" placeholder="Team" required></input></td>
        </tr>
      </table>
      <span class = "formTitle">Autonomous</span>
      <table class = "formTable">
        <tr>
          <td>Starting Place:</td>
          <td><input type="radio" name="startPos" value="l" required>Left</td>
          <td><input type="radio" name="startPos" value="c" required>Center</td>
          <td><input type="radio" name="startPos" value="r" required>Right</td>
        </tr>
        <tr>
          <td>Abilities:</td>
          <td><input type="checkbox" name="abilitiesBL" value="">Baseline</td>
          <td><input type="checkbox" name="abilitiesSW" value="">Switch</td>
          <td><input type="checkbox" name="abilitiesSC" value="">Scale</td>
          <td><input type="checkbox" name="abilitiesPI" value="">Pickup</td>
        </tr>
      </table>
      <span class = "formTitle">Teleoperated</span>
      <table class = "formTable">
        <tr>
          <td>Def/Off:</td>
          <td style = "text-align: left;"><input type="radio" name="type" value="def">Defense<input type="radio" name="type" value="off">Offense</input></td>
        </tr>
        <tr>
          <td>Switch:</td>
          <td><input type="number" name="switch" required></input></td>
        </tr>
        <tr>
          <td>Scale:</td>
          <td><input type="number" name="scale" required></input></td>
        </tr>
        <tr>
          <td>Vault:</td>
          <td><input type="number" name="vault" required></input></td>
        </tr>
      </table>
      <span class = "formTitle">Post Match</span>
      <table class = "formTable">
        <tr>
          <td>End Position:</td>
          <td><input type="radio" name="endPos" value="field" required>Field</td>
          <td><input type="radio" name="endPos" value="plat" required>Platform</td>
          <td><input type="radio" name="endPos" value="climb" required>Climb</td>
        </tr>
        <tr>
          <td>Climb Assists:</td>
          <td><input type="radio" name="climbAsst" value="0" required>0</td>
          <td><input type="radio" name="climbAsst" value="1" required>1</td>
          <td><input type="radio" name="climbAsst" value="2" required>2</td>
        </tr>
      </table>
      <span class = "formTitle">Penalties</span>
      <table class = "formTable">
      	<tr>
      		<td>Foul:</td>
      		<td><input type="checkbox" name = "PenaltiesFoul" value="Foul"></td>
      	</tr>
      	<tr>
      		<td>Tech Foul:</td>
      		<td><input type="checkbox" name = "PenaltiesTech" value="Tech Foul"></td>
      	</tr>
      	<tr>
      		<td>Yellow Card:</td>
      		<td><input type="checkbox" name = "PenaltiesYellow" value="Yellow Card"></td>
      	</tr>
      	<tr>
      		<td>Red Card:</td>
      		<td><input type="checkbox" name = "PenaltiesRed" value="Red Card"></td>
      	</tr>
      	<tr>
      		<td>Disabled:</td>
      		<td><input type="checkbox" name = "PenaltiesDisabled" value="Disabled"></td>
      	</tr>
      	<tr>
      		<td>Disqualified:</td>
      		<td><input type="checkbox" name = "PenaltiesDisqualified" value="Disqualified"></td>
      	</tr>
      </table>
      <span class = "formTitle">Notes</span>
      <br>
      <input type="text" name="notes"></input>
      <br><br>
      <input type="submit" name="submit" value="Log" class = "scoutingSubmit"></input>
    </form>
  </div>
</center>

<?php include($dir . "/footer.php") ?>
