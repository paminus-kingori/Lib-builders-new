
<?php
include'loginExec.php';

$dbhandle= new mysqli('localhost','root', '', 'libbuilder');

$query= "SELECT *FROM material";
$res1=$dbhandle->query($query);
$query2= "SELECT *FROM equipment";
$res2=$dbhandle->query($query2);
require 'Dbconnection.php';
$query15 = mysqli_query($con, "select count(status) as total from myorder where status='incomplete'");
   $query16 = mysqli_query($con, "select count(status) as total from hire where status='incomplete'");
   $result16= mysqli_fetch_array($query16);
$result15 = mysqli_fetch_array($query15);
$total= $result16['total'] + $result15['total'];

$query = mysqli_query($con, "select count(*) as total from myorder");
$result = mysqli_fetch_array($query);
$query1 = mysqli_query($con, "select count(*) as total from transaction");
$result1 = mysqli_fetch_array($query1);
$query2 = mysqli_query($con, "select count(*) as total from project");
$result2 = mysqli_fetch_array($query2);
$query3 = mysqli_query($con, "select count(*) as total from equipment");
$result3 = mysqli_fetch_array($query3);
$query4 = mysqli_query($con, "select count(*) as total from material");
$result4 = mysqli_fetch_array($query4);
$query5 = mysqli_query($con, "select count(status) as total from comment where status='UNREAD'");
$result5 = mysqli_fetch_array($query5);
$query6 = mysqli_query($con, "select count(*) as total from article");
$result6 = mysqli_fetch_array($query6);
$query7 = mysqli_query($con, "select  SUM(likes) as total from article ");
$result7 = mysqli_fetch_array($query7);

$rer1 = mysqli_query($con, "SELECT * FROM material  ");
    $results=array();
while($res=$rer1->fetch_assoc()){
  $results[]=$res;
}
$pie_chart_data=array();
foreach($results as $check){
  $pie_chart_data[]= array($check['material_name'],(int)$check['quantity']);

}
$pie_chart_data=json_encode($pie_chart_data);
mysqli_free_result($rer1);
$duncan=9;
$test=9;
$from=date("Y-m-d");
$to=date("Y-m-d");
//mysqli_close($con);
/*$myfile = fopen("c:\\wamp\\www\\Student\\try.txt", "r+")or die("Unable to open file!");
while(!feof($myfile)){
  echo fgets($myfile);
}
fclose($myfile); 
$duncan='And we did it';
$handle= fopen("c:\\wamp\\www\\Student\\try.txt", "r+")or die("Unable to open file!");
fwrite($handle,$duncan);
fclose($handle); */

?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],
            
<?php
         
           
while($row=$res1->fetch_assoc()){
  echo "['".$row['material_name']."',".$row['quantity']."],";
}
   ?>  
       ]);

        var options = {
          title: 'Construction Material',
           pieHole:0.3,
           is3D:true,
           
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

      }
      
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Returns', 'Expenses'],
          <?php
         
        $pop=mysqli_query($con,"SELECT c.material_name,c.unit_price,o.transaction_number,o.total_price,o.quantity,o.balance,o.transaction_date FROM material AS c
 INNER JOIN transaction AS o
 ON c.rawmat_id=o.rawmat_id
 GROUP BY o.transaction_date
 ORDER BY c.material_name, o.transaction_number; ");   
while($row1=$pop->fetch_assoc()){
  echo "['".($row1['transaction_date'])."',".$row1['unit_price']*$row1['quantity'].",".($row1['total_price']-$row1['balance'])."],";
}
   ?>  
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
     



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          <?php
          $queryx = mysqli_query($con, "select count(*) as total from customer ");
   $resultx= mysqli_fetch_array($queryx);
   echo "['network',".$resultx['total']."],";
   ?>
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          <?php
         
        $pop10=mysqli_query($con,"SELECT c.material_name,c.unit_price,o.transaction_number,o.total_price,o.quantity,o.balance,o.transaction_date FROM material AS c
 INNER JOIN transaction AS o
 ON c.rawmat_id=o.rawmat_id
 GROUP BY c.material_name
 ORDER BY c.material_name, o.transaction_number; ");   
while($row1=$pop10->fetch_assoc()){
  echo "['".($row1['material_name'])."',".($row1['unit_price']*$row1['quantity']).",".($row1['total_price']-$row1['balance']).",".($row1['total_price']-$row1['balance'])."],";
}
   ?>  
        ]);

        var options = {
          chart: {
            title: 'sales per material',
            subtitle: 'Sales, Expenses, and Profit: ',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<style>

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  border-top: 1px solid orange;
    border-right: 1px solid grey;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: orange;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<body >
    
    <nav style="background-color:#00e6ac;">
        <div class="over" ></div>
        <span class="logo">
            <img src="images/LIB.jpg" alt="logo image" class="logo-image" style="border-radius:40px; width:75px ; height: 70px;">
            <article>
            <p style="color: black; font-weight: bold;">Lib Home</p>
            <p style="color: black; font-weight: bold;">Builders</p>
            </article>
        </span>


        <span class="search-sect">
                <input type="text" name="searchbar" id="searchbar" class="searchbar" placeholder="Search record">
                <img src="icons/search-svgrepo-com.svg" alt="search" class="search-icon">
        </span>

        <img src="icons/menu-svgrepo-com.svg" alt="menu" class="menu-icon mobile">


        <span class="links">
            <a href="homepage.php">
                <img src="icons/homepage.svg" alt="home" class="icon">
                Home
            </a>
            <a href="project.php">
                <img src="icons/project-task.svg" alt="project" class="icon">
                Projects
                <img src="icons/triangle black and white.svg" alt="triangle" class="icon twist">
            </a>
            <a href="blog.php">

                <img src="icons/comment-blog.svg" alt="blog" class="icon">
                Blog
            </a>
            <a href="about.html">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
</svg>
                About
            </a>
        </span>
         <?php
        if (isset($_SESSION['user'])) : ?>
            
           
           
       
          <?php $username=$_SESSION['user']['username']; ?>
          
   

        <?php endif ?>

        <?php

$db = mysqli_connect('localhost', 'root', '', 'libbuilder');
$query = mysqli_query($db, "SELECT * FROM admin where username='$username'");
$ress = mysqli_fetch_array($query);

                 $firstname=$ress['first_name'];
                  $lastname=$ress['last_name'];
                   $profile=$ress['profile_pic'];


?>
        <span class="username" style="background-color: orange;"><?php if (isset($_SESSION['user'])) : ?>
            <img src="images/<?php echo $profile ?>" alt="avatar" class="avatar" style='border-radius: 20px;background-color: #00e6ac;'>
           
           
        <?php echo $_SESSION['user']['first_name'];
          $username=$_SESSION['user']['username']; ?>
          
    <?php echo $_SESSION['user']['last_name']; ?><br>

        <?php endif ?>

        </span>
    </nav>
    <main>
    <div class="top">
        <!-- for mobile view  -->
        <span class="dashboard mobile">
            <img src="icons/dashboard-svgrepo-com.svg" alt="dashboard">
            Dashboard
        </span>


        <div class="view-sect" >
          <div class="report" style="border-top: 2px;">
                 <a href="fullReport.php?from=<?php echo $from;?>&to=<?php echo $to;?>"><img src="icons/analytics-report-svgrepo-com.svg" alt="report" class="report-icon"  style="width: 40px; height: 40px;"></a>
                View Reports
            </div>
            <div class="report">
                 <a href="manageAdmin.php"><svg xmlns="http://www.w3.org/2000/svg" width=" 20px" height="20px" fill="grey"  class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg></a>
                manage Admins
            </div>
 
            <div class="to">
                 <a href="transactionReport.php"><img src="icons/download-svgrepo-com.svg" alt="download"></a>
                Sales 
            </div>

            <div class="to">

                 <a href="orderReport.php"><img src="icons/download-svgrepo-com.svg" alt="download"></a>
                Order 
               
            </div>
            <div class="to">
                 <a href="hireReport.php"><img src="icons/download-svgrepo-com.svg" alt="download"></a>
                Hire 

            </div>
            


        </div>
<!--div class="track" id="chart_div" style="width: 400px; height: 120px;margin-right: 2px;">
     
</div>-->

        <div class="social-icon" style=" margin-right:20px;">
            <span>
                 <a href="viewcomment.php"><img src="icons/message-svgrepo-com.svg" alt="mege"></a>
                <small class="message" style="color: white; background-color:orange; width: 30px; height: 30px; border-radius: 20px;text-align:center;padding-top: 3px;">
                   <?php echo $result5['total'];?>
                </small>
            </span>
            <span>
                 <a href="notifications.php"><img src="icons/notification-svgrepo-com.svg" alt="notification"></a>
                <small class="notification" style="color:white;background-color:orange; width: 30px; height: 30px; border-radius: 20px;text-align:center;padding-top: 3px;">
                <?php echo $total ?>
                </small>

            </span>
            <span>
                 <a href="deletelike.php"><img src="icons/connections-scheme-svgrepo-com.svg" alt="connections"></a>
                <small class="shares"style="color: white;background-color:orange; width: 30px; height: 30px; border-radius: 20px;text-align: center;padding-top: 3px;">
                    <?php echo $result7['total'];?>
                </small>
              
            </span>
        </div>
    </div>
    <div class="left" style="height: 90%;   overflow: hidden;background-image: url('back.png');
">
<span style="font-size:15px;cursor:pointer; margin-left:90%;" onclick="openNav()">&#9776; </span>

<div id="mySidenav" class="sidenav" style="height: 90%;margin-top: 12%;background-image: url('back.png');">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#"><img src="icons/connections-scheme-svgrepo-com.svg" alt="connections" style="width: 30px;color: red;">Review</a>
  <a href="#"><img src="images/icon_news.png" alt="connections" style="width: 30px;">Append Article</a>
  <a href="viewuser.php"> <img src="icons/person-circle.svg" alt="connections" style="width: 30px;">Clients</a>
  <a href="logout.php"> <img src="icons/settings-svgrepo-com.svg" alt="connections" style="width: 30px;"><small>logout</small></a>
   
    <a href="addarticle.php"> <img src="icons/comment-blog.svg" alt="connections" style="width: 30px;">Add Article</a>

</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "290px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
        <span  class="dashboard" id="chart_div" style="width: 220px; height: 120px;margin-left: 15%;">
            <!--img src="icons/dashboard-svgrepo-com.svg" alt="dashboard">-->
            
         
        </span>
<p style="margin-right:30%;font-weight: bold;">Admin Dashbord</p>
        <span class="text" style="border-bottom: 1px solid orange;">
            <article style="color:black;">Active Orders</article>
            <a href="completeorder.php" style="text-decoration: none;"><div class="order-value"style="background-color:white;width: 50px;text-align: center; height:20px; border-left:1px solid orange;">
               <?php echo $result['total'];?>
            </div></a>
        </span>

        <span class="text" style="border-bottom: 1px solid orange;">
            <article style="color:black;">Transactions</article>
            <a href="addtransaction.php" style="text-decoration: none;"><div class="trans-value"style="background-color:white;width: 50px;text-align: center; height:20px; border-left:1px solid orange;color:black;">
               <?php echo $result1['total'];?>
            </div></a>
        </span>

        <span class="text" style="border-bottom: 1px solid orange;">
            <article style="color:black;">Projects</article>
            <a href="addproject.php" style="text-decoration: none;"><div class="projects-value"style="background-color:white;width: 50px;text-align: center; height:20px; border-left:1px solid orange;color: black;">
                  <?php echo $result2['total'];?>
            </div></a>
        </span>

        <span class="text" style="border-bottom: 1px solid orange;">
            <article style="color:black">Material</article >
            <a href="addmaterial.php" style="text-decoration: none;"><div class="material-value"style="background-color:white;width: 50px;text-align: center; height:20px; border-left:1px solid orange;color:black;">
              <?php echo $result4['total'];?>
            </div></a>
        </span>

        <span class="text" style="border-bottom: 1px solid orange;">
           <article style="color:black; text-underline-position: none;">Equipment</article>
            <a href="addequipment.php"style="text-decoration: none;"><div class="equipment-value" style="background-color:white;width: 50px;text-align: center; height:20px; border-left:1px solid orange;color:black;">
               <?php echo $result3['total'];?>
            </div></a>
        </span>

        <div class="social-media mobile">
            <div class="media">
                <img src="icons/twitter-svgrepo-com.svg" alt="twitter">
                Twitter
            </div>
        
            <div class="media">
                <img src="icons/facebook-svgrepo-com.svg" alt="fb">
                Facebook
            </div>
        
            <div class="media">
               <img src="icons/skype-svgrepo-com.svg" alt="skype">
                Skype
            </div>
        </div>
 <a href="Adminsettings.php?service_Id=<?php echo $username;?>" style="text-decoration: none">
        <button class="settings">
            <img src="icons/settings-svgrepo-com.svg" alt="settings">
            Account Settings
        </button>
      </a>
    </div>
    <div class="right">
<h1>

<?php 
$today=date('Y-m-d');
$pop=mysqli_query($con,"SELECT c.material_name,c.unit_price,o.transaction_number,o.total_price,o.quantity,o.balance FROM material AS c
 INNER JOIN transaction AS o
 
 ON c.rawmat_id=o.rawmat_id
where o.transaction_date='$today'
 ORDER BY c.material_name, o.transaction_number; ");


  $expenditure=0;
    $total_price=0;
    $profit=0; 
       while ($row=mysqli_fetch_array($pop)){
          ?>
          

             
                    <?php $expenditure+=($row['quantity'] * $row['unit_price']);
                          $total_price+=($row['total_price'] +$row['balance']);
                            $profit=$expenditure-$total_price;
                     ?>
           <?php }?>

    
     
    <p style="font-size:15px;"> DAILY SALES REPORT SUMMARY</p>
    <p style="font-size:9px;position: left;"><?php echo $today;  ?></p>
</h1>
<div class="today" style="border-top: 2px solid orange;background-image: url('back.png');">
        <span class="text cash" style="background-color:orange;">
            <article>Sales Today :</article>
            <div class="sales-value">
               Ksh <?php  echo $expenditure ?>.00
            </div>
        </span>

        <span class="text cash" style="background-color:orange; ">
            <article>Total Returns :</article >
            <div class="profit-value" >
              Ksh <?php  echo $profit ?>.00
            </div>
        </span>

        <span class="text cash" style="background-color:orange; ">
            <article>Profit:</article>
            <div class="returns-value">
               Ksh <?php echo $total_price; ?>
            </div>
        </span>
</div>

<div class="graphics" style=" background-image: url('back.png');" >
    <div class="graphic-card" id="piechart" style="width: 320px; height: 200px;background: white;border-top: 1px solid orange;">
            <!-- Main css -->
<!--?php  $myfile = fopen("c:\\wamp\\www\\Student\\try.txt", "r+")or die("Unable to open file!");
while(!feof($myfile)){
  echo fgets($myfile);
}
fclose($myfile);?>-->
        <p >Profit growth</p >
             
    </div>


    <div class="graphic-card" id="curve_chart" style="width: 320px; height: 200px;background: white;border-top: 1px solid orange;">
       <p>Items</p>  
        
        <!--img src="icons/pie-chart-svgrepo-com.svg" alt="profit growth">-->
        
 </div>


    <div class="graphic-card"style=" position: left; margin-right: 50%; margin-top: 5px; width: 320px; height: 200px; margin-top: 5px;background: white;" id="barchart_material" >
       <p>Sales growth</p>
        <!--img src="icons/line-graph-chart-svgrepo-com.svg" alt="profit growth">-->
       
       
    </div>
     
</div>


<div class="report mobile">
    <img src="icons/analytics-report-svgrepo-com.svg" alt="report" class="report-icon">
    View Report
</div>

<div class="view-sect mobile">
    
    <div class="to">
        <img src="icons/download-svgrepo-com.svg" alt="download">
        To PDF
    </div>
    <div class="to">
        <img src="icons/download-svgrepo-com.svg" alt="download">
        To Excel
    </div>
    <div class="to">
        <img src="icons/download-svgrepo-com.svg" alt="download">
        To Txt
    </div>
</div>

<div class="social-media" style="border-top: 1px solid grey; padding-top: 2px;">
    <div class="media">
         <a href=""><img src="icons/twitter-svgrepo-com.svg" alt="twitter"></a>
        Twitter
    </div>

    <div class="media">
         <a href=""><img src="icons/facebook-svgrepo-com.svg" alt="fb"></a>
        Facebook
    </div>

    <div class="media">
         <a href=""><img src="icons/skype-svgrepo-com.svg" alt="skype"></a>
        Skype
    </div>
</div>
    </div>
</main>
</body>

<script>
    const menu = document.querySelector(".menu-icon");
    const over = document.querySelector(".over");
    const links = document.querySelector(".links")
    const search = document.querySelector(".search-sect")
    const username = document.querySelector(".username")
    const logo = document.querySelector(".logo")

    menu.addEventListener("click", function(){
        over.classList.toggle("showHeight");
        links.classList.toggle("showGrid");
        search.classList.toggle("showFlex");
        username.classList.toggle("showFlex");
        logo.classList.toggle("disappear");
        
    })
    function changer(img){
        console.log(1)
        img.src = "icons/skype-svgrepo-com.svg"
      
    }
</script>
</html>