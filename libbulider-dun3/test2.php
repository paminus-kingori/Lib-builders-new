<?php
    $servername = "localhost";
    $username = "root";
    $password = "";  //your database password
    $dbname = "libbuilder";  //your database name

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else
    {
        //echo ("Connect Successfully");
    }
    $query = "SELECT odered_at, raword_id FROM myorder"; // select column
    $aresult = $con->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Massive Electronics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['ordered_at','raword_id'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["ordered_at"]."', ".$row["raword_id"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Date_time Vs Room Out Temp',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
        </script>
    </head>
    </html>
    