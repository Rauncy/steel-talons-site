<!-- NOTE: DEPRECATED -->

<!--  NOT ENOUGH INFO TO MAKE A FULL PROFILE FOR EACH TEAM; DOESN'T MAKE ANY SENSE-->
<?php $dir = ".."; include($dir . "/header.php"); ?>

<div class = "profile">

</div>

<script type="text/javascript" defer>
  function createProfile(num){


    $.ajax({
      url: 'https://www.thebluealliance.com/api/v3/team/frc' +num ,
      headers: {
          'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
      },
      method: 'GET',
      dataType: 'json',
      success: function(data){

            var htmlCode = "Number: "+num +"<br>Name: "+data.nickname+"<br />Website: <a target = '_blank'href = '"+data.website+"'>"+data.website+"</a>";
            $('.profile').append(htmlCode);


        }
    });

    return false;
  }

  <?php
  $team_number =  $_GET['team_number'];


  // echo "alert('hi');";
  // echo "alert('".$team_number."');"
  echo "createProfile('";
  echo $team_number."');";


  ?>
</script>
