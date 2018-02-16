<?php $dir = ".."; include($dir . "/header.php"); ?>
<body onload = "pageReload()">

	<script type="text/javascript">
	const upperBound = 15;
	var pageNum = 0;
	var xhr;
	var currentTeamNumber=1;
	function next(){
		if(pageNum<upperBound)
		{
			xhr.abort();
			pageNum++;
			document.getElementById('page').innerHTML = pageNum+1;
			pageReload();
		}
	}
	function prev(){
		if(pageNum>0)
		{
			xhr.abort();
			pageNum--;
			document.getElementById('page').innerHTML = pageNum+1;
			pageReload();
		}
	}
	function pageData(pageNum,searchData) {
		const RESULTLIMIT = 15;
		var resultCount=0;
		// while(resultCount<RESULTLIMIT){
			xhr = $.ajax({
			url: 'https://www.thebluealliance.com/api/v3/teams/' + 14 ,
			headers: {
			'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
			},
			method: 'GET',
			async: false,
			dataType: 'json',
			success: function(data){
				for(var i =0; i<data.length;i++){
				if(data[i]!=null){
					if(!(searchData.length==0))
					{
						var searchRegex = new RegExp(searchData, 'i');
						if(searchRegex.test(data[i].nickname) || searchData==data[i].team_number){
							var team_name = data[i].nickname,
									team_city = data[i].city,
									team_number = data[i].team_number,
									team_rook = data[i].rookie_year,
									team_motto = data[i].motto,
									team_state = data[i].state_prov,
									team_country = data[i].country;
							//manually set conveniences

							var team_name_raw = team_name;
							if(team_name.length>20){
								team_name = team_name.substring(0,20)+"..."
							}
							if(team_number == "5427"){
								team_motto = "Building a Legacy"
							}
							if(team_number == "7281"){
								team_motto = "China numba one!"
							}
							if(team_motto!=null){
								team_motto = team_motto.replace("'","");
							}
							var notAvailable = "N/A";
							if(team_city == null){
								team_city = notAvailable;
							}
							if(team_motto == null){
								team_motto = notAvailable;
							}
							if(team_state == null){
								team_state = notAvailable;
							}
							if(team_country == null){
								team_country = notAvailable;
							}
							var $htmlCodeForTeam = '<a target = "_blank"  style = "font-size:22px;" id = "'+team_number+'" href="/teams/team_profile.php?team_number=' + team_number + '&team_name='+team_name_raw+'" title = "'+team_name_raw+'">'+team_name+'</a> '+'- ('+team_number+')<br><br>';
							$('#tba').append($htmlCodeForTeam);
							// var win = window.open('team_profile.php?team_number=' + team_number + '&team_name='+team_name_raw, '_blank');


							resultCount++;
						}
					}
					else {
						if(data[i].nickname!=''&&data[i].nickname){
							var team_name = data[i].nickname,
									team_city = data[i].city,
									team_number = data[i].team_number,
									team_rook = data[i].rookie_year,
									team_motto = data[i].motto,
									team_state = data[i].state_prov,
									team_country = data[i].country;

									var team_name_raw = team_name;
							//manually set conveniences
							if(team_name.length>20){
								team_name = team_name.substring(0,20)+"..."
							}
							if(team_number == "5427"){
								team_motto = "Building a Legacy"
							}
							if(team_number == "7281"){
								team_motto = "China numba one!"
							}
							if(team_motto!=null){
								team_motto = team_motto.replace("'","");
							}
							var notAvailable = "N/A";
							if(team_city == null){
								team_city = notAvailable;
							}
							if(team_motto == null){
								team_motto = notAvailable;
							}
							if(team_state == null){
								team_state = notAvailable;
							}
							if(team_country == null){
								team_country = notAvailable;
							}
							var $htmlCodeForTeam = '<a target = "_blank" style = "font-size:22px;" id = "'+team_number+'"href="/teams/team_profile.php?team_number=' + team_number + '&team_name='+team_name_raw+'" title = "'+team_name_raw+'">'+team_name+'</a> '+'- ('+team_number+')<br><br>';
							$('#tba').append($htmlCodeForTeam);
							// if(team_number>1291)
							 // var win = window.open('/teams/team_profile.php?team_number=' + team_number + '&team_name='+team_name_raw, '_blank');
							 // win.close();
							resultCount++;
						}
					}//else for checking if search data
			}//ajax success
		}//end for loop
		}
		})//end ajax request
		currentTeamNumber++;
	//}//end while loop
	}
	function pageReload() {
		var url = new URL(window.location.href);
		var searchData = url.searchParams.get("search");
		document.getElementById('tba').innerHTML = "";
		var pN = pageNum;
		pageData(pageNum,searchData);
		return false;
	}
	</script>
	<h1 style = "display: inline;">The Blue Alliance Teams</h1>
	<div style = "display: inline; margin-left: 500px; ">
		<center><form onsumbit = "return false"><input id= "srch" type="text" name="search" onsubmit="pageReload()" placeholder="Search"></form>
		<button type="button" name="prev" onclick="prev()">Prev</button>
		<p style = "display: inline;padding: 20px;"id = "page">1</p>
		<button type="button" name="next" onclick="next()">Next</button></center>
	</div>
	<i style = "display: block"> --Click on Teams to Learn More--</i>
	<div id="tba" style="column-count: 6;font-size:12px;padding: 40px;"></div>




</body>
