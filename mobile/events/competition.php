<?php $dir = ".."; include($dir . "/header.php"); ?>
<script type="text/javascript">
      var general = $.ajax({
        url: 'https://www.thebluealliance.com/api/v3/event/2018txho/teams',
        headers: {
            'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
        },
        method: 'GET',
        dataType: 'json',
        success: function(data){
          // console.log('nick: '+data[data.length-1].nickname);
          console.log(data);
          teams = "<ul>";
          for(var i=0;i<data.length;i++){
            teams+="<li>";
            // console.log('data'+ data[i].team_key);
            teams+='<a target = "_blank" style="color: black;font-size: 14px;font-family: monospace;"  id = "'+data[i].team_number+'"href="/teams/team_profile.php?number='+data[i].team_number+'">'+data[i].nickname+'</a> - '+data[i].team_number+'<br><br>';

            teams+="</li>";
          }
          teams+="</ul>";
          $('.teamList').append(teams);

        }
    });-
</script>

<div class="teamList" style="column-count: 3">

</div>
