<?php $dir = "../"; include($dir . "/header.php"); include($dir . "/globals.php");?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<h1 id = "demo">lol</h1>
<div id="chartContainer" style="height: 300px; width: 400px;"></div>

<script type="text/javascript">
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        document.getElementById("demo").innerHTML = myObj.title;

          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1",
            axisX:{
              title: myObj.xLabel
            },
            axisY:{
              title: myObj.yLabel,
              includeZero: true,
              valueFormatString: "#",
            },
            data: [{
              type: "line",
              name: "Scale",
              markerType: "square",
              dataPoints: myObj.data
            }]
          });
          chart.render();


        // document.getElementById('chartContainer').style.height="390px";


    }
  };
  xmlhttp.open("GET", "graphs_json.txt", true);
  xmlhttp.send();



</script>
