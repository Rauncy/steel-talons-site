// canvas that shows stats of a team based on team number
function displayCanvas(num_switch,num_scale,num_vault){


  var myCanvas = document.getElementById("myCanvas");
  myCanvas.width = 300;
  myCanvas.height = 300;

  var ctx = myCanvas.getContext("2d");
  var myVinyls = {
      "Scale": num_switch,
      "Switch": num_scale,
      "Vault": num_vault
  };
//   var myVinyls = {
//     "Classical music": 10,
//     "Alternative rock": 14,
//     "Pop": 2,
//     "Jazz": 12
// };
  var myLegend = document.getElementById("myLegend");
  var myPiechart = new Piechart(
      {
          canvas:myCanvas,
          data:myVinyls,
          colors:["#fde23e","#f16e23", "#57d9ff"],
           legend:myLegend
      }
  );
  myPiechart.draw();
}

var Piechart = function(options){
    this.options = options;
    this.canvas = options.canvas;
    this.ctx = this.canvas.getContext("2d");
    this.colors = options.colors;

    this.draw = function(){
        var total_value = 0;
        var color_index = 0;
        for (var categ in this.options.data){
            var val = this.options.data[categ];
            total_value += val;
        }
        console.log(total_value);

        var start_angle = 0;
        for (categ in this.options.data){
            val = this.options.data[categ];
            var slice_angle = 2 * Math.PI * val / total_value;

            drawPieSlice(
                this.ctx,
                this.canvas.width/2,
                this.canvas.height/2,
                Math.min(this.canvas.width/2,this.canvas.height/2),
                start_angle,
                start_angle+slice_angle,
                this.colors[color_index%this.colors.length]
            );

            start_angle += slice_angle;
            color_index++;
        }
        start_angle = 0;
        for (categ in this.options.data){
                val = this.options.data[categ];
                slice_angle = 2 * Math.PI * val / total_value;
                var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
                var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(start_angle + slice_angle/2);

                if (this.options.doughnutHoleSize){
                    var offset = (pieRadius * this.options.doughnutHoleSize ) / 2;
                    labelX = this.canvas.width/2 + (offset + pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                    labelY = this.canvas.height/2 + (offset + pieRadius / 2) * Math.sin(start_angle + slice_angle/2);
                }
                if(val!=0){
                  var labelText = Math.round(100 * val / total_value);
                  this.ctx.fillStyle = "white";
                  this.ctx.font = "bold 20px Arial";
                  this.ctx.fillText(labelText+"% - ("+val+")", labelX-20,labelY);
                }
                start_angle += slice_angle;
          }

        if (this.options.legend){
            color_index = 0;
            var legendHTML = "";
            for (categ in this.options.data){
                legendHTML += "<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div>";
            }
            this.options.legend.innerHTML = legendHTML;
        }

    }

    function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
        ctx.fillStyle = color;
        ctx.beginPath();
        ctx.moveTo(centerX,centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.closePath();
        ctx.fill();
    }
    function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.stroke();
    }
    function drawLine(ctx, startX, startY, endX, endY){
        ctx.beginPath();
        ctx.moveTo(startX,startY);
        ctx.lineTo(endX,endY);
        ctx.stroke();
    }
}


function lineDistribution(scaleArr, switchArr, vaultArr) {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
  axisX:{
    title: "Match"
  },
	axisY:{
    title: "Cubes",
		includeZero: true,
    valueFormatString: "#",
	},
  legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
    itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
    showInLegend: true,
		name: "Scale",
		markerType: "square",
		dataPoints: scaleArr
	},
  {
		type: "line",
    showInLegend: true,
		name: "Vault",
		markerType: "triangle",
		dataPoints: vaultArr
	},
  {
		type: "line",
    showInLegend: true,
		name: "Switch",
		markerType: "circle",
		dataPoints: switchArr
	}
]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

// document.getElementById('chartContainer').style.height="390px";

}
