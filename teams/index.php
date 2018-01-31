<?php $dir = ".."; include($dir . "/header.php"); ?>
<body onload = "pageReload()">

	<script type="text/javascript">

	const upperBound = 17;
	var pageNum = 1;
	var xhr;
	var lastTeamNum;
	lastTeamNum[0] = 0;
	var resultsUsed;

	function next(){
		if(pageNum<upperBound)
		{
			xhr.abort();
			pageNum++;
			document.getElementById('page').innerHTML = pageNum;
			pageReload();
		}
	}
	function prev(){
		if(pageNum>1)
		{
			xhr.abort();
			pageNum--;
			document.getElementById('page').innerHTML = pageNum;
			pageReload();
		}
	}
	function pageData(pageNum,searchData) {
		document.getElementById('srch').value = new URL(window.location.href).searchParams.get("search");
		var resultCount=0;
		var pageToSearch = pageNum-1;

		while(resultCount<=500)
		{
			xhr = $.ajax({
				url: 'https://www.thebluealliance.com/api/v3/teams/' + (pageToSearch++),
				headers: {
				'X-TBA-Auth-Key':'38wgMXShpksmFpPKfB8BLgT5kq8EajYkVlgnfT45FtL66TdI2agNuWllA8Nrzizx'
				},
				method: 'GET',
				dataType: 'json',
				success: function(data[]){
					if(searchData&&searchData!='')
					{

						var searchRegex = new RegExp(searchData, 'i');
						if(searchRegex.test(data[].nickname) || searchData==data[].team_number){
							resultCount++;
							resultsUsed++;
							var team_name = data[].nickname,
									team_city = data[].city,
									team_number = data[].team_number,
									team_rook = data[].rookie_year,
									team_motto = data[].motto,
									team_state = data[].state_prov,
									team_country = data[].country;

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
							var $htmlCodeForTeam = '<a href="/teams/team_profile.php?team_number=' + team_number + '" title = "hovering">'+team_name+'</a> '+'- ('+team_number+')<br><br>';
							$('#tba').append($htmlCodeForTeam);
							resultCount++;
						}
					}
					else {
						if(data[].nickname!=''&&data[].nickname){
							resultCount++;
							resultsUsed++;
							var team_name = data[].nickname,
									team_city = data[].city,
									team_number = data[].team_number,
									team_rook = data[].rookie_year,
									team_motto = data[].motto,
									team_state = data[].state_prov,
									team_country = data[].country;

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
							var $htmlCodeForTeam = '<a href="/teams/team_profile.php?team_number=' + team_number + '" title = "hovering">'+team_name+'</a> '+'- ('+team_number+')<br><br>';
							$('#tba').append($htmlCodeForTeam);
							resultCount++;
						}
		}
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
