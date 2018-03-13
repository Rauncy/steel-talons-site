<!--  back end needs to be done-->
<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
<<<<<<< HEAD
function submitScouting(){


  //gathering post variables;
  $match = $_POST["match"];
  $teamNumber = $_POST["team"];
  $startPos = $_POST["startPos"];


  $abilities = "none|";
  if (isset($_POST["abilities"])) {
    $abilities ="";
    $name =  $_POST["abilities"];
    foreach ($name as $ability){
        $abilities .=$ability."|";
    }
  }
  //gets rid of the last '|'
  $abilities = substr($abilities,0,-1);

  $type = (isset($_POST["type"])?$_POST["type"]:"none");
  $switch = $_POST["switch"];
  $scale = $_POST["scale"];
  $vault = $_POST["vault"];

  $endPos = $_POST["endPos"];
  $climbAsst = $_POST["climbAsst"];

  $penalties = "none|";
  if (isset($_POST["penalties"])) {
    $penalties ="";
    $name =  $_POST["penalties"];
    foreach ($name as $pen){
        $penalties .=$pen."|";
    }
  }
  //gets rid of the last '|'
  $penalties = substr($penalties,0,-1);


  $notes = (isset($_POST["notes"])?$_POST["notes"]:"None");

  $memberID = $_SESSION["dbid"];

  //reviews what user put. do we need to keep? if we do, we need CSS styles
  echo "<table style='position: absolute; top: 200px;'>
    <thead>
      <tr>
        <th>Variable</th>
        <th>Result</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Match</td>
        <td>".$match."</td>
      </tr>
      <tr>
        <td>Team</td>
        <td>".$teamNumber."</td>
      </tr>
      <tr>
        <td>Starting</td>
        <td>".$startPos."</td>
      </tr>
      <tr>
        <td>Abilities</td>
        <td>".$abilities."</td>
      </tr>
      <tr>
        <td>Type</td>
        <td>".$type."</td>
      </tr>
      <tr>
        <td>Switch</td>
        <td>".$switch."</td>
      </tr>
      <tr>
        <td>Scale</td>
        <td>".$scale."</td>
      </tr>
      <tr>
        <td>Vault</td>
        <td>".$vault."</td>
      </tr>
      <tr>
        <td>End Pos</td>
        <td>".$endPos."</td>
      </tr>
      <tr>
        <td>Climb Asst</td>
        <td>".$climbAsst."</td>
      </tr>
      <tr>
        <td>Penalties</td>
        <td>".$penalties."</td>
      </tr>
      <tr>
        <td>Notes</td>
        <td>".$notes."</td>
      </tr>
    </tbody>
  </table>";



  //putting scouting info in database
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

  $sql = "INSERT INTO scouting(matchNumber, teamNumber, startPos, abilities, strategy, switch, scale, vault, endPos, climbAsst, penalties, notes, memberID) VALUES ('".$match."', '".$teamNumber."', '".$startPos."', '".$abilities."','".$type."', '".$switch."','".$scale."','".$vault."','".$endPos."', '".$climbAsst."','".$penalties."','".$notes."','".$memberID."');";

  $result = $conn->query($sql);

  $conn->close();
}

=======
>>>>>>> 18234216e259eb8db6a5591edae70a8d18b19d0b
if(isset($_POST["submit"])){
  submitScouting();
}

<<<<<<< HEAD
=======
function submitScouting(){
  // echo "<table style='position: absolute; top: 200px;'>
  //   <thead>
  //     <tr>
  //       <th>Variable Name</th>
  //       <th>Result</th>
  //     </tr>
  //   </thead>
  //   <tbody>
  //     <tr>
  //       <td>Match</td>
  //       <td>".$_POST["match"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Team</td>
  //       <td>".$_POST["team"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Starting</td>
  //       <td>".$_POST["startPos"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Abilities</td>
  //       <td>".(isset($_POST["abilitiesBL"])?1:0)."|".(isset($_POST["abilitiesSW"])?1:0)."|".(isset($_POST["abilitiesSC"])?1:0)."|".(isset($_POST["abilitiesPI"])?1:0)."</td>
  //     </tr>
  //     <tr>
  //       <td>Type</td>
  //       <td>".(isset($_POST["type"])?$_POST["type"]:"non")."</td>
  //     </tr>
  //     <tr>
  //       <td>Switch</td>
  //       <td>".$_POST["switch"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Scale</td>
  //       <td>".$_POST["scale"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Vault</td>
  //       <td>".$_POST["vault"]."</td>
  //     </tr>
  //     <tr>
  //       <td>End Pos</td>
  //       <td>".$_POST["endPos"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Climb Asst</td>
  //       <td>".$_POST["climbAsst"]."</td>
  //     </tr>
  //     <tr>
  //       <td>Penalties</td>
  //       <td>".(isset($_POST["PenaltiesFoul"])?1:0)."|".(isset($_POST["PenaltiesTech"])?1:0)."|".(isset($_POST["PenaltiesYellow"])?1:0)."|".(isset($_POST["PenaltiesRed"])?1:0)."|".
  //       (isset($_POST["PenaltiesDisabled"])?1:0)."|".(isset($_POST["PenaltiesDisqualified"])?1:0)."</td>
  //     </tr>
  //     <tr>
  //       <td>Notes</td>
  //       <td>".(isset($_POST["notes"])?$_POST["notes"]:"None")."</td>
  //     </tr>
  //   </tbody>
  // </table>";
  if(session_status()===2){
    //Use database for user validation and creation
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $conn = new mysqli($servername, $username, $password, "robotics");
    if($conn->connect_error){
      echo "CONERR";
      die();
    }
    $date = date("h:i:sa");
    $auto_abilities_bin = "";
    if(isset($_POST["abilitiesBL"])) {
      $auto_abilities_bin . "1";
    }
    else {
      $auto_abilities_bin . "0";
    }
    if(isset($_POST["abilitiesSW"])) {
      $auto_abilities_bin . "1";
    }
    else {
      $auto_abilities_bin . "0";
    }
    if(isset($_POST["abilitiesSC"])) {
      $auto_abilities_bin . "1";
    }
    else {
      $auto_abilities_bin . "0";
    }
    if(isset($_POST["abilitiesPI"])) {
      $auto_abilities_bin . "1";
    }
    else {
      $auto_abilities_bin . "0";
    }
    $auto_abilities_dec = bindec($auto_abilities_bin);
    $startPos = -1;
    if($_POST['startPos'] == 'l') {
      $startPos = 0;
    }
    else if($_POST['startPos'] == 'c') {
      $startPos = 1;
    }
    else if($_POST['startPos'] == 'r') {
      $startPos = 2;
    }
    $playstyle = -1;
    if($_POST['type'] == 'def') {
      $playstyle = 0;
      }
    else if($_POST['type'] == 'off') {
      $playstyle = 1;
      }
    $endPos = -1;
    if($_POST['endPos'] == 'field') {
      $endPos = 0;
    }
    else if($_POST['endPos'] == 'plat') {
      $endPos = 1;
    }
    else if($_POST['endPos'] == 'climb') {
      $endPos = 2;
    }
    $penalties_bin = "";
    if(isset($_POST["PenaltiesFoul"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    if(isset($_POST["PenaltiesTech"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    if(isset($_POST["PenaltiesYellow"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    if(isset($_POST["PenaltiesRed"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    if(isset($_POST["PenaltiesDisabled"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    if(isset($_POST["PenaltiesDisqualified"])) {
      $penalties_bin . "1";
    }
    else {
      $penalties_bin . "0";
    }
    $penalties_dec = bindec($penalties_bin);
    echo "QUER<br>";
    echo 'insert into Scouting (Team, Author, Timestamp, Competition, MatchNumber, StartPos, AutoAbilities, Playstyle, Penalties, Notes) values (\'' . $_POST["team"] . '\', \'' . $_SESSION["dbid"]
      . '\', \'' . $date . '\', \'Lone Star Central\', \'' . $_POST["match"] . '\', \''.  $startPos .'\', \''. $auto_abilities_dec.'\', \''. $playstyle.'\', \''. $penalties_dec.'\', \''. $_POST["notes"].'\');';
      echo "<br>".$auto_abilities_bin." ".$auto_abilities_dec;
    $conn->query('insert into Scouting (Team, Author, Timestamp, Competition, MatchNumber, StartPos, AutoAbilities, Playstyle, Penalties, Notes) values (\'' . $_POST["team"] . '\', \'' . $_SESSION["dbid"]
      . '\', \'' . $date . '\', \'Lone Star Central\', \'' . $_POST["match"] . '\', \''.  $startPos .'\', \''. $auto_abilities_dec.'\', \''. $playstyle.'\', \''. $penalties_dec.'\', \''. $_POST["notes"].'\');');
        $formNum = $conn->query("select ScoutingID from Scouting where MatchNumber = ". $_POST["match"]. " and Team = ".$_POST["team"].";")->fetch_assoc()["ScoutingID"];
        $conn->query('insert into Scouting2018 (ScoutingReport, Switch, Scale, Vault, EndPos, ClimbAssts) values ("' . $formNum . '", "' . $_POST["switch"] . '", "' . $_POST["scale"] .'", "'. $_POST["vault"]. '",
      "'. $endPos. '", "'. $_POST["climbAsst"]. '");');
      echo "T: ".$formNum;
  }
}
>>>>>>> 18234216e259eb8db6a5591edae70a8d18b19d0b
?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class = "title">Scouting 2018</h1>
  <a href=<?php echo $dir . "/scouting/entries.php"?> id = "entriesLink">Scouting Form Entries</a>
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
          <td><input type="radio" name="startPos" value="left" required>Left</td>
          <td><input type="radio" name="startPos" value="center" required>Center</td>
          <td><input type="radio" name="startPos" value="right" required>Right</td>
        </tr>
        <tr>
          <td>Abilities:</td>
          <td><input type="checkbox" name="abilities[]" value="baseline">Baseline</td>
          <td><input type="checkbox" name="abilities[]" value="switch">Switch</td>
          <td><input type="checkbox" name="abilities[]" value="scale">Scale</td>
          <td><input type="checkbox" name="abilities[]" value="pickup">Pickup</td>
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
          <td><input type="radio" name="endPos" value="platform" required>Platform</td>
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
      		<td><input type="checkbox" name = "penalties[]" value="Foul"></td>
      	</tr>
      	<tr>
      		<td>Tech Foul:</td>
      		<td><input type="checkbox" name = "penalties[]" value="Tech Foul"></td>
      	</tr>
      	<tr>
      		<td>Yellow Card:</td>
      		<td><input type="checkbox" name = "penalties[]" value="Yellow Card"></td>
      	</tr>
      	<tr>
      		<td>Red Card:</td>
      		<td><input type="checkbox" name = "penalties[]" value="Red Card"></td>
      	</tr>
      	<tr>
      		<td>Disabled:</td>
      		<td><input type="checkbox" name = "penalties[]" value="Disabled"></td>
      	</tr>
      	<tr>
      		<td>Disqualified:</td>
      		<td><input type="checkbox" name = "penalties[]" value="Disqualified"></td>
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
</center>

<?php include($dir . "/footer.php") ?>
