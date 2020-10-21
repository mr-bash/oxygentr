function bashChart() {
  if($(window).width() < 768) {
    screenWidth = "bar";
  } else {
    screenWidth = "column";
  }
  var options = {
    backgroundColor: "transparent",
    data: [{
      indexLabelPlacement: "inside",
      indexLabelFontColor: "#FFF",
      type: screenWidth,
      yValueFormatString: "#,###",
      indexLabel: "{y}",
      color: "#26a0fc",
      dataPoints: [
        { label: "السعودية", y: 99},
        { label: "تركيا", y: 144 },
        { label: "تونس", y: 44 },
        { label: "الجزائر", y: 39 },
        { label: "الأردن", y: 59 },
        { label: "السودان", y: 78 },
        { label: "مصر", y: 85 },
        { label: "الأمارات", y: 55 },
        { label: "قطر", y: 65 },
        { label: "العراق", y: 53 },
      ]
    }],
    axisY:{
      labelFontSize: 0,
      gridThickness: 1,
      gridColor: "#F8F8F8",
    },
    axisX:{
      titleFontFamily: 'Omar',
      labelFontFamily: 'Omar',
      labelFontSize: 13,
      labelFontColor: '#453e3e',
      margin: 40,
    },
    toolTip:{
      fontSize: 14,
      fontColor: "#453e3e",
      borderColor: "#FFF",
      fontFamily: 'Omar',
      },
    legend : {
      fontColor: "red",
  },
  };
  $("#chartContainer").CanvasJSChart(options);
  
  function updateChart() {
    var performance, deltaY, yVal;
    var dps = options.data[0].dataPoints;
    for (var i = 0; i < dps.length; i++) {
      deltaY = Math.round(1 + Math.random() * (-1 - 1));
      yVal = deltaY + dps[i].y > 0 ? dps[i].y + deltaY : 0;
      dps[i].y = yVal;
    }
    options.data[0].dataPoints = dps;
    $("#chartContainer").CanvasJSChart().render();
  };
  updateChart();
  
  setInterval(function () { updateChart() }, 3000);
  
  }
  bashChart();