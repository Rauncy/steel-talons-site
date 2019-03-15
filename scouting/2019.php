<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
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
		if(isset($_POST["author"])&&$_POST["author"]!=""&&$_SESSION["perm"]<=1) {
			$author = $_POST["author"];
		}else {
      $param = $conn->prepare("select FirstName, LastName from Members where MemberID = ?;");
      $param->bind_param("i", $_SESSION["dbid"]);
      $param->execute();
      $author = $param->get_result()->fetch_assoc();
      $param->close();
      $author = $author["FirstName"]." ".$author["LastName"];
		}

    $levelCargo;
    if(isset($_POST["cargoLvl3"])){
      $levelCargo = 3;
    }else if(isset($_POST["cargoLvl2"])){
      $levelCargo = 2;
    }else if(isset($_POST["cargoLvl1"])){
      $levelCargo = 1;
    }else{
      $levelCargo = 0;
    }
    $levelHatches;
    if(isset($_POST["hatchesLvl3"])){
      $levelHatches = 3;
    }else if(isset($_POST["hatchesLvl2"])){
      $levelHatches = 2;
    }else if(isset($_POST["hatchesLvl1"])){
      $levelHatches = 1;
    }else{
      $levelHatches = 0;
    }

    //Remove double or more consecutive spaces
    $_POST["notes"] = trim(preg_replace('/\s+/', ' ', $_POST["notes"]));

    $param = $conn->prepare("insert into Scouting (Team, Author, Timestamp, Year, Competition, MatchNumber, StartPos, EndPos, Notes) values (?, ?, ?, \"2019\", ?, ?, ?, ?, ?);");
    $param->bind_param("isssisss", $_POST["team"], $author, $date, $currentComp, $_POST["match"], $_POST["startPos"], $_POST["endPos"], $_POST["notes"]);
    $param->execute();
    $param->close();

    $param = $conn->prepare("select ScoutingID from Scouting where MatchNumber = ? and Team = ? and Competition = ? and Year = ?;");
    $param->bind_param("iiss", $_POST["match"], $_POST["team"], $currentComp, $currentYear);
    $param->execute();
    $scoutID = $param->get_result()->fetch_assoc()["ScoutingID"];
    $param->close();

    $param = $conn->prepare("insert into Scouting2019 (ScoutingReport, HatchesRocket, HatchesCargo, CargoRocket, CargoCargo, HatchLevels, CargoLevels) values (?, ?, ?, ?, ?, ?, ?);");
    $param->bind_param("iiiiiii", $scoutID, (isset($_POST["hatchesRocket"])?$_POST["hatchesRocket"]:0), (isset($_POST["hatchesCargoShip"])?$_POST["hatchesCargoShip"]:0), (isset($_POST["cargoRocket"])?$_POST["cargoRocket"]:0),(isset($_POST["cargoCargoShip"])?$_POST["cargoCargoShip"]:0), (isset($_POST["hatchLvl"])?$_POST["hatchLvl"]:0), (isset($_POST["cargoLvl"])?$_POST["cargoLvl"]:0));
    $param->execute();
    $param->close();

    $autoAbilities = array("abilitiesCD2"=>"Climb Down (Lvl 2)", "abilitiesCD3"=>"Climb Down (Lvl 3)", "abilitiesRKT"=>"Rocket Deposit", "abilitiesCGS"=>"Cargo Ship", "abilitiesHTC"=>"Hatch", "abilitiesCRG"=>"Cargo");
    $abilities = array("canHatch"=>"hatch", "canCargo"=>"Cargo", "canClimb2"=>"Climb (Lvl 2)", "canClimb3"=>"Climb (Lvl 3)");
    $param = $conn->prepare("insert into Abilities (ScoutingReport, Auto, Ability) values (?, true, ?);");
    $param->bind_param("is", $scoutID, $display);
    foreach($autoAbilities as $currAbility => $display){
      if(isset($_POST[$currAbility])) $param->execute();
    }
    $param->close();

    $param = $conn->prepare("insert into Abilities (ScoutingReport, Auto, Ability) values (?, false, ?);");
    $param->bind_param("is", $scoutID, $currAbility);
    foreach($abilities as $currAbility => $display){
      if(isset($_POST[$currAbility])) $param->execute();
    }
    $param->close();

    $penalties = array("PenaltiesYellow"=>"Yellow Card", "PenaltiesRed"=>"Red Card", "PenaltiesDisabled"=>"Robot Disabled", "PenaltiesDisqualified"=>"Disqualified");
    $param = $conn->prepare("insert into Penalties (ScoutingReport, Penalty) values (?, ?);");
    $param->bind_param("is", $scoutID, $display);
    foreach($penalties as $penalty => $display){
      if(isset($_POST[$penalty])) $param->execute();
    }
    $param->close();
    //End of database logging TODO
  }
}

if(isset($_POST["submit"])){
  submitScouting();
}
?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class="title">Scouting 2019</h1>
  <h1 class="subtitle">Deep Space</h1>
  <?php if(session_status()==2):?>
    <div class="formContainer">
      <form action="2019" method="post">
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
          <?php if($_SESSION["perm"]<=2):?>
    				<tr>
              <td>Author (Optional):</td>
              <td><input type="text" name = "author" placeholder="Author"></input></td>
            </tr>
          <?php endif;?>
        </table>
        <span class = "formTitle">Sandstorm</span>
        <table class = "formTable">
          <tr>
            <td>Starting Place:</td>
            <td><input type="radio" name="startPos" value="Left" required>Left</td>
            <td><input type="radio" name="startPos" value="Center" required>Center</td>
            <td><input type="radio" name="startPos" value="Right" required>Right</td>
          </tr>
          <tr>
            <td>Sandstorm Abilities:</td>
            <td><input type="checkbox" name="abilitiesCD2" value="climb2Auto">Level 2 Descend</td>
            <td><input type="checkbox" name="abilitiesCD3" value="climb3Auto">Level 3 Descend</td>
            <td><input type="checkbox" name="abilitiesRKT" value="rocketAuto">Rocket</td>
          </tr>
          <tr>
            <td></td>
            <td><input type="checkbox" name="abilitiesCGS" value="cargoShipAuto">Cargo Ship</td>
            <td><input type="checkbox" name="abilitiesHTC" value="hatchAuto">Hatch</td>
            <td><input type="checkbox" name="abilitiesCRG" value="cargoAuto">Cargo</td>
          </tr>
        </table>
        <span class = "formTitle">Round Stats</span>
        <table class = "formTable">
          <tr>
            <td>Hatches (Rocket):</td>
            <td><input type="number" name="hatchesRocket" required></input></td>
          </tr>
          <tr>
            <td>Hatches (Cargo Ship):</td>
            <td><input type="number" name="hatchesCargoShip" required></input></td>
          </tr>
          <tr>
            <td>Cargo secured (Rocket):</td>
            <td><input type="number" name="cargoRocket" required></input></td>
          </tr>
          <tr>
            <td>Cargo secured (Cargo Ship):</td>
            <td><input type="number" name="cargoCargoShip" required></input></td>
          </tr>
        </table>
        <span class = "formTitle">Post Match</span>
        <table class = "formTable">
          <tr>
            <td>End Position:</td>
            <td><input type="radio" name="endPos" value="Field" required>Field</td>
            <td><input type="radio" name="endPos" value="Level 1" required>Level 1</td>
            <td><input type="radio" name="endPos" value="Level 2" required>Level 2</td>
            <td><input type="radio" name="endPos" value="Level 3" required>Level 3</td>
          </tr>
          <tr>
            <td>Abilities:</td>
            <td><input type="checkbox" name="canHatch" value="canHatch">Pick up hatches</td>
            <td><input type="checkbox" name="canCargo" value="canCargo">Pick up cargo</td>
            <td><input type="checkbox" name="canClimb2" value="canClimb2">Climb (Level 2)</td>
            <td><input type="checkbox" name="canClimb3" value="canClimb3">Climb (Level 3)</td>
          </tr>
          <tr>
            <td>Highest Hatch Level:</td>
            <td><input type="radio" name="hatchLvl" value="0" required>None</td>
            <td><input type="radio" name="hatchLvl" value="1" required>Level 1</td>
            <td><input type="radio" name="hatchLvl" value="2" required>Level 2</td>
            <td><input type="radio" name="hatchLvl" value="3" required>Level 3</td>
          </tr>
          <tr>
            <td>Highest Cargo Level:</td>
            <td><input type="radio" name="cargoLvl" value="0" required>None</td>
            <td><input type="radio" name="cargoLvl" value="1" required>Level 1</td>
            <td><input type="radio" name="cargoLvl" value="2" required>Level 2</td>
            <td><input type="radio" name="cargoLvl" value="3" required>Level 3</td>
          </tr>
        </table>
        <span class = "formTitle">Significant Penalties</span>
        <table class = "formTable">
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
        <span class = "formTitle">Personal Comment</span>
        <br>
        <textarea name="notes" style="resize: none; height: 5em; width: 20em;"></textarea>
        <!-- <input type="text" name="notes"></input> -->
        <br><br>
        <input type="submit" name="submit" value="Log" class = "scoutingSubmit"></input>
      </form>
    </div>
  <?php else:?>
    <h2 class="postNotif">You must be logged in to submit scouting</h2>
  <?php endif;?>
</center>
<?php include($dir . "/footer.php"); ?>
