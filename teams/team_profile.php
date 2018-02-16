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

            var general ="<h3>General</h3>"
            general+="<p id = 'general_info'>"
            general+="Number: "+num +"<br>Name: "+data.nickname
            if(data.website !=null) {
              general+="<br />Website: <a target = '_blank'href = '"+data.website+"'>"+data.website+"</a>";
            }
            general+="<br> Location: "+data.city+", "+data.state_prov+", "+data.country;
            general+="<br>RookieYear: "+data.rookie_year
            if(data.motto !=null){
              general += "<br>Motto: <i>"+data.motto+"</i>";
            }
            else {
              general +="<br>Motto: no";
            }
            general+="</p>"
            $('.profile').append(general);





        }
    });

    return false;
  }

  <?php
  $team_number =  $_GET['team_number'];
  $team_name =  $_GET['team_name'];

  // $servername = "localhost";
  // $username = "root";
  // $password = "root";
  // $dbname = "robotics";
  //
  // // Create connection
  // $conn = new mysqli($servername, $username, $password, $dbname);
  // // Check connection
  // if ($conn->connect_error) {
  //     die("Connection failed: " . $conn->connect_error);
  // }
  //
  //
  //   $sql = "INSERT INTO teams VALUES(".$team_number.",'".$team_name."');";
  //   $result = $conn->query($sql);




  // $conn->close();

  // echo "alert('hi');";
  // echo "alert('".$team_number."');"
  echo "createProfile('";
  echo $team_number."');";


  ?>
</script>

<?php   $team_number =  $_GET['team_number'];
  $team_name =  $_GET['team_name'];

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "robotics";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      echo ("Connection failed: " . $conn->connect_error);
  }


    $sql = "INSERT INTO teams VALUES(".$team_number.",'".$team_name."');";
    $result = $conn->query($sql);

    // echo "Result: ".$result;

    $conn->close();


    ?>
