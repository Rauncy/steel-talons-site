<?php $dir = ".."; include($dir . "/header.php"); ?>

<form class="scouting" action="index.php" method="post">

  Shooting:
    <input type="radio" name = "shooting" value="fast">Fast
    <input type="radio" name = "shooting" value="accurate">Accurate<br>

  Gears Delivered: <input type="text" name="GearsDelivered" value=""><br>
  Gears Gathered: <input type="text" name="GearsGathered" value=""><br>
  Climb: <input type="text" name="Climb" value=""><br>
  Human Player: <input type="text" name="HumanPlayer" value=""><br><br>

  Penalties:<br>
    <input  type="radio" name = "penalties" value="Foul">Foul<br>
    <input  type="radio" name = "penalties" value="Tech Foul">Tech Foul<br>
    <input  type="radio" name = "penalties" value="Yellow Card">Yellow Card<br>
    <input  type="radio" name = "penalties" value="Red Card">Red Card<br>
    <input  type="radio" name = "penalties" value="Disabled">Disabled<br>
    <input type="radio" name = "penalties" value="Disqualified">Disqualified<br>
    <input  type="radio" name = "penalties" value="None">None<br><br>

  Driver Ability: <input type="text" name="DriverAbility" value=""><br>
  Mechanical Errorr: <input type="text" name="MechanicalError" value=""><br>
  Climbing Dificulties: <input type="text" name="ClimbingDificulties" value=""><br>
  Defense: <input type="text" name="Defense" value=""><br>

  <input type="submit" name="scouting" value="Submit">

</form>
