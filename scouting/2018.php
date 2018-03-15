<!--  back end needs to be done-->
<?php $dir = ".."; include($dir . "/header.php"); ?>
<?php
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

  $memberID = $_SESSION["name"];


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

  $sql = "INSERT INTO scouting(matchNumber, teamNumber, startPos, abilities, strategy, switch, scale, vault, endPos, climbAsst, penalties, notes, member) VALUES ('".$match."', '".$teamNumber."', '".$startPos."', '".$abilities."','".$type."', '".$switch."','".$scale."','".$vault."','".$endPos."', '".$climbAsst."','".$penalties."','".$notes."','".$memberID."');";

  $result = $conn->query($sql);

  $conn->close();
}

if(isset($_POST["submit"])){
  submitScouting();
}


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
