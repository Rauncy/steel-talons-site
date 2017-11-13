<!-- NOTE: DEPRECATED -->

<!--  NOT ENOUGH INFO TO MAKE A FULL PROFILE FOR EACH TEAM; DOESN'T MAKE ANY SENSE-->
<?php $dir = ".."; include($dir . "/header.php"); ?>

<div class = "profile">

</div>

<script type="text/javascript" defer>
  function createProfile(num, name, city, rook, motto, state, country){

    var htmlCode = (num + "<br>" + name + "<br>" + city + "<br>" + rook + "<br>" + motto + "<br>" + state + "<br>" +country);

     $('.profile').append(htmlCode);
  }
  <?php
  $team_number =  $_GET['team_number'];
  // echo "<br>";
  $team_name =  $_GET['team_name'];
  // echo "<br>";
  $team_city = $_GET['team_city'];
  // echo "<br>";
  $team_rook =  $_GET['team_rook'];
  // echo "<br>";
  $team_motto =  $_GET['team_motto'];
  // echo "<br>";
  $team_state =  $_GET['team_state'];
  // echo "<br>";
  $team_country =  $_GET['team_country'];

  // echo "alert('hi');";
  // echo "alert('".$team_number."');"
  echo "createProfile('";
  echo $team_number."','".$team_name."','". $team_city."','".$team_rook."','". $team_motto."','" .$team_state."','".$team_country."');";


  ?>
</script>
