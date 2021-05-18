<?php
$servername="localhost";
$username="root";
$password="";
$database="libbuilder";
$mysqli= new mysqli($servername,$username,$database);
if($mysqli->connect_error){
	die("Connection failed:" .$mysqli->connect_error);

}
$query="SELECT *FROM project";
$qresult=$mysqli->query($query);
$result=array();
while($res=$qresult->fetch_asso()){
	$results[]=$res;
}
$pie_chart_data=array();
foreach($results as $result){
	$pie_chart_data[]= array($result['status'],(int)$result['price']);

}
$pie_chart_data=json_encode($pie_chart_data);
mysqli_free_result($qresult);

$query="SELECT * FROM ORDERS";
$qresult=$mysqli->query($query);
$results=array();
while($res=$qresult->fetch_asso()){
	$results[]=$res;
}
$bar_chart_data=array();
foreach ($results as  $result){
	$bar_chart_data[]=array($result['order_number'], (int)$result['price'], (int)$result['quantity']);
	$bar_chart_data=json_encode($bar_chart_data);
	mysqli_free_result($result);
	mysqli_close($mysqli);



	
	<!--Load the AjAX API-->
	$HTML= <<<X Y Z
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	//load the visualization API and the charts package
	google.load('visualization','1.0',{'packages':['corechart']});
	//set a callback to run when the Google visualization API is loaded
	google.setOnLoadCallback(drawChart);
	//callback that creates and populates a data table,
	//instantiates the piechart, passes in the data and
	//draws it.

	function drawChart(){
		var data= new google.visualization.DataTable();
		data.addColumn('string','Age Range');
		data.addColumn('number','Number');
		data.addColumn({$pie_chart_data});
		// set chart Options
		var Options ={
			title:''
		};
var chart= new google.visualization.PieChart(document.getElementById('pie_chart_div'));
chart.draw(data,Options);


	}

	//Make the charts responsive
	jQuery(document).ready(function()){
		jQuery(window).resize(function()){
			drawChart();
		});
	});


	</script>


X Y Z;
echo $HTML;
?>

