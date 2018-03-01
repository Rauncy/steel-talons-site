<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = <?php echo $dir . "/css/teamProfile.css"?>>
<div class = "profile" style = "display: block;">

</div>

</body>

<table id="events">
  <!-- <h3>Events</h3> -->
  <tr>
    <th>Name</th>
    <th>Date</th>
    <th>Location</th>
    <th>Ranking</th>
    <th>Awards</th>
  </tr>
</table>


<script type="text/javascript" defer>
  function createProfile(num){

    //general
    var general = $.ajax({
      url: 'https://www.thebluealliance.com/api/v3/team/frc' +num ,
      headers: {
          'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
      },
      method: 'GET',
      dataType: 'json',
      success: function(data){

            var general ="<h2 style = 'padding: 30px;'><center><i>"+data.nickname+"</i></center></h2><div id = 'info'>"

            general+="<div class = 'listInfo' id = 'general_info'><ul><h3>General</h3>"
            // general+="Number: "+num +"<br>Name: "+data.nickname
            general+="<li>Team Number: "+data.team_number+"</li>";

            general+="<li> Location: "+data.city+", "+data.state_prov+", "+data.country+"</li>";
            general+="<li>Rookie Year: "+data.rookie_year+"</li>";
            if(data.motto !=null){
              general += "<li>Motto: <i>"+data.motto+"</i>"+"</li>";
            }
            else if(num=='5427'){
              general +="<li>Motto: <i>Building a Legacy</i></li>"
            }
            else {
              general +="<li>Motto: N/A"+"</li>";
            }
            if(data.website !=null) {
              general+="<li>Website: <a class = 'square' target = '_blank'href = '"+data.website+"'>"+data.website+"</a></li>";
            }
            general+="</ul></div>"
            $('.profile').append(general);


        },
        complete: function(data){
          $.ajax({
            url: 'https://www.thebluealliance.com/api/v3/team/frc' +num+"/robots" ,
            headers: {
                'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
            },
            method: 'GET',
            dataType: 'json',
            success: function(data){
              var robots = '<div class = "listInfo" id = "robots_list"><ul style = "margin-left: 200px;"><h3>Robots</h3>';
              if(num=='5427'){
                robots+="<li>Falcon 1 - 2015</li>";
                robots+="<li>Falcon 2 - 2016</li>";
                robots+="<li>Falcon 3 - 2017</li>";
                robots+="<li>Falcon Light - 2018</li>";

              }
              else if(data.length==0){
                robots+="<li> No Robot Names :(</li>";
              }
              for(var i=0;i<data.length;i++){
                  robots+="<li>"+data[i].robot_name+" - "+data[i].year+"</li>";
              }
              robots+="</ul></div>"
              $('.profile').append(robots);
            },
            complete: function(data){
              $.ajax({
                url: 'https://www.thebluealliance.com/api/v3/team/frc' +num+"/social_media" ,
                headers: {
                    'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
                },
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    var media = '<div class = "listInfo" id = "media_list"><ul style = "margin-left: 200px;"><h3>Social Media</h3>';
                    if(num=='5427'){
                      media+="<li><a class = 'square' target = '_blank' href = 'https://github.com/Team5427'>GitHub</a></li>"
                      media+="<li><a class = 'square' target = '_blank' href = 'https://www.youtube.com/channel/UCCafmXtkUxY_oBQZ5h8ObcQ'>YouTube</a></li>"
                    }
                    if(data.length==0){
                      media+="<li>No Social Media :(</li>"
                    }
                    for(var i=0;i<data.length;i++){
                        var type = data[i].type;
                        media+="<li>";
                        var link="none";
                        if(type == "facebook-profile"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.facebook.com/"+data[i].foreign_key+"'>Facebook</a>";
                        }
                        if(type == "youtube-channel"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.youtube.com/user/"+data[i].foreign_key+"'>YouTube</a>";
                        }
                        if(type == "cdphotothread"){
                          link = "<a class = 'square' target = '_blank' href ='"+data[i].foreign_key+"'>CDPhotoThread</a>";
                        }
                        if(type == "imgur"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.facebook.com/"+data[i].foreign_key+"'>Imgur</a>";
                        }
                        if(type == "twitter-profile"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.twitter.com/"+data[i].foreign_key+"'>Twitter</a>";
                        }
                        if(type == "github-profile"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.github.com/"+data[i].foreign_key+"'>GitHub</a>";
                        }
                        if(type == "instagram-profile"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.instagram.com/"+data[i].foreign_key+"'>Instagram</a>";
                        }
                        if(type == "periscope-profile"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.periscope.com/"+data[i].foreign_key+"'>Periscope</a>";
                        }
                        if(type == "grabcad"){
                          link = "<a class = 'square' target = '_blank' href = 'https://www.grabcad.com/library/"+data[i].foreign_key+"'>GrabCAD</a>";
                        }
                        if(type == "external-link"){
                          link = "<a class = 'square' target = '_blank' href = '"+data[i].foreign_key+"'>Link</a>";
                        }

                        media += link + "</li>"
                    }
                    media+="</ul></div></div>"
                    $('.profile').append(media);

                  }
              });
            }
          });
        }
    });



    //event table
    var eventKeys = [];
      $.ajax({
          url: 'https://www.thebluealliance.com/api/v3/team/frc' +num+"/events/simple" ,
          headers: {
              'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
          },
          method: 'GET',
          dataType: 'json',
          success: function(data){
            var events="";
              for(var i=data.length-1;i>=0;i--){
                 events+="<tr>"+
                 "<td>"+data[i].name+"</td>"+
                 "<td>"+data[i].start_date+"</td>"+
                 "<td>"+data[i].city+", "+data[i].state_prov+" "+data[i].country+"</td>";
                 events+="<td class = 'ranking'>NA</td><td class = 'award'></td></tr>";
                eventKeys.push(data[i].key);
              }
              $('#events').append(events);
            },
          complete: function(data1){
            for(var c = eventKeys.length-1; c >= 0; c--){
              runAjaxAwards(num, c, eventKeys[c]);
           }
           for(var c = eventKeys.length-1; c >= 0; c--){
             runAjaxRanking(num, c, eventKeys[c]);
           }
          }
        });

    return false;
  }
  function runAjaxAwards( teamNum,  eventIt,  eventKey){
    $.ajax({
       url: 'https://www.thebluealliance.com/api/v3/team/frc'+teamNum+"/event/"+eventKey+"/awards" ,
       headers: {
           'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
       },
       method: 'GET',
       dataType: 'json',
       success: function(data){
         if(data.length==0){
            $('.award')[eventIt].innerHTML = '<center>-   -</center>'
         }
         else {
           var list = "<ul style='list-style-type:square'>";
           // $('.award')[eventIt].append(ul);
           for( a=0; a<data.length;a++){
                 list+=("<li>"+data[a].name+"</li>");

             }
             list+="</ul>";
              $('.award')[eventIt].innerHTML = (list);
          }
         }

     });
  }
  function runAjaxRanking( teamNum,  eventIt,  eventKey){
    $.ajax({
       url: 'https://www.thebluealliance.com/api/v3/team/frc'+teamNum+"/event/"+eventKey+"/status" ,
       headers: {
           'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
       },
       method: 'GET',
       dataType: 'json',
       success: function(data){
              if(data.qual.ranking.rank==null){
                rankingInfo = "NA";
              }
              else{
               rankingInfo = data.qual.ranking.rank+"/"+data.qual.num_teams;
             }
              $('.ranking')[eventIt].innerHTML = (rankingInfo);
         },

     });
  }


  <?php
  $team_number =  $_GET['team_number'];


  echo "createProfile('";
  echo $team_number."');";


  ?>

</script>
<div id = "background"><img class = "stretch" src=<?php echo $dir . "/images/teamProfileBackground.jpg"?> alt="image"></div>
<style media="screen">
/*  to span image above across page, background image*/
#background {
		width: 100%;
		height: 100%;
		position: fixed;
		left: 0px;
		top: 0px;
		z-index: -999;
}

.stretch {
		width:100%;
		height:100%;
}
</style>
