<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
/*
function submitScouting(){
  if(session_status()===2){
    $dir = "..";
    include($dir . "/globals.php");
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $conn = new mysqli($servername, $username, $password, "robotics");
    if($conn->connect_error){
      die();
    }

    //Set timestamp for submission
    $date = date("Y-m-d H:i:s");

    //Apply author name
		if($_POST["author"]!=""&&$_SESSION["perm"]<=1) {
			$author = $_POST["author"];
		}else {
      $param = $conn->prepare("select FirstName, LastName from Members where MemberID = ?;");
      $param->bind_param("i", $_SESSION["dbid"]);
      $param->execute();
      $author = $param->get_result()->fetch_assoc();
      $param->close();
      $author = $author["FirstName"]." ".$author["LastName"];
		}

    //Remove double or more consecutive spaces
    $_POST["notes"] = trim(preg_replace('/\s+/', ' ', $_POST["notes"]));

    // $penalties_dec = bindec($penalties_bin);
    $formData = $conn->query("select ScoutingID from Scouting where MatchNumber = ". $_POST["match"]. " and Team = ".$_POST["team"]." and Competition = '".$currentComp."' and Year = ".$currentYear.";");
    if(gettype($formData)!="boolean"&&$formData->num_rows===0)
    {
      $conn->query('insert into Scouting (Team, Author, Timestamp, Competition, MatchNumber, StartPos, AutoAbilities, Playstyle, Penalties, Notes, Year) values (\'' . $_POST["team"] . '\', \'' . $author
      . '\', \'' . $date . '\', \''.$currentComp.'\', \'' . $_POST["match"] . '\', \''.  $startPos .'\', \''. $auto_abilities.'\', \''. $playstyle.'\', \''. $penalties.'\', \''. $_POST["notes"]
      .'\', '.$currentYear.');');
      $formNum = $conn->query("select ScoutingID from Scouting where MatchNumber = ". $_POST["match"]. " and Team = ".$_POST["team"]." and Competition = '".$currentComp."' and Year = ".$currentYear.";")->fetch_assoc()["ScoutingID"];
      $conn->query('insert into Scouting2018 (ScoutingReport, Switch, Scale, Vault, EndPos, ClimbAssts) values ("' . $formNum . '", "' . $_POST["switch"] . '", "' . $_POST["scale"] .'", "'. $_POST["vault"]. '",
      "'. $endPos. '", "'. $_POST["climbAsst"]. '");');
    }
    else {
        $_POST["err"] = 0;
    }
  }
}

if(isset($_POST["submit"])){
  submitScouting();
}
*/
?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class="title">Scouting 2018</h1>
  <h1 class="subtitle">Power Up</h1>
  <h5 class="postNotif">Due to a database structure change, the scouting submission for 2018 is disabled temporarily</h5>
  <?php if(session_status()==2):?>
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
  				<tr>
            <td>Author (Optional):</td>
            <td><input type="text" name = "author" placeholder="Author"></input></td>
          </tr>
        </table>
        <span class = "formTitle">Autonomous</span>
        <table class = "formTable">
          <tr>
            <td>Starting Place:</td>
            <td><input type="radio" name="startPos" value="left" required>Left</td>
            <td><input type="radio" name="startPos" value="center" required>Center</td>
            <td><input type="radio" name="startPos" value="right" required>Right</td>
          </tr>
          <tr>
            <td>Abilities:</td>
            <td><input type="checkbox" name="abilitiesBL" value="baseline">Baseline</td>
            <td><input type="checkbox" name="abilitiesSW" value="switch">Switch</td>
            <td><input type="checkbox" name="abilitiesSC" value="scale">Scale</td>
            <td><input type="checkbox" name="abilitiesPI" value="pickup">Pickup</td>
          </tr>
        </table>
        <span class = "formTitle">Teleoperated</span>
        <table class = "formTable">
          <tr>
            <td>Def/Off:</td>
            <td style = "text-align: left;"><input type="checkbox" name="def" value="def">Defense<input type="checkbox" name="off" value="off">Offense</input></td>
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
            <td><input type="radio" name="endPos" value="Field" required>Field</td>
            <td><input type="radio" name="endPos" value="Platform" required>Platform</td>
            <td><input type="radio" name="endPos" value="Climb" required>Climb</td>
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
        <textarea name="notes" style="resize: none; height: 15em; width: 20em;"></textarea>
        <!-- <input type="text" name="notes"></input> -->
        <br><br>
        <input type="submit" name="submit" value="Log" class = "scoutingSubmit"></input>
      </form>
    </div>
  <?php else:?>
    <h2 class="postNotif">You must be logged in to submit scouting</h2>
  <?php endif;?>
</center>
<?php include($dir . "/footer.php") ?>
