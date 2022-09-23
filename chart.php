<?php
 
$dataPoints = array(
	array("label"=> "Education", "y"=> 10),
	array("label"=> "Entertainment", "y"=> 15),
	array("label"=> "Lifestyle", "y"=> 20),
	array("label"=> "Business", "y"=> 2),
	array("label"=> "Music & Audio", "y"=> 12),
	array("label"=> "Personalization", "y"=> 9),
	array("label"=> "Tools", "y"=> 50),
	array("label"=> "Books & Reference", "y"=> 25),
	array("label"=> "Travel & Local", "y"=> 20),
	array("label"=> "Puzzle", "y"=> 14)
);
	
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Google Play Categories - till 2017"
	},
	axisY: {
		title: "Number of Apps",
		includeZero: false
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 