


<?php
$id=$_GET['service_Id'];
$dbhandle= new mysqli('localhost','root', '', 'libbuilder');
$query= "SELECT *FROM customer WHERE email_address='$id' GROUP BY email_address";
$rer=$dbhandle->query($query);
while($rr=mysqli_fetch_array($rer)){
    ?>

                <?php $longitude=$rr['longitude']; ?>
                 <?php $latitude=$rr['latitude']; ?>
                  <?php $location_address=$rr['physical_address']; ?>
                    <?php $created_at=$rr['created_at']; ?>
                 
                    

                 
  <?php }
  date_default_timezone_set("Africa/Nairobi");
$today=date("F j, Y /",time());

//calculating the distance
function getDistance($addressFrom, $addressTo,$unit=''){
	$id=$_GET['service_Id'];
	$dbhandle= new mysqli('localhost','root', '', 'libbuilder');
$query= "SELECT *FROM customer WHERE email_address='$id' GROUP BY email_address DESC LIMIT 1";
$rer=$dbhandle->query($query);
while($rr=mysqli_fetch_array($rer)){
    ?>

             <?php $longitude=$rr['longitude']; ?>
                 <?php $latitude=$rr['latitude']; ?>
                  <?php $location_address=$rr['physical_address']; ?>
                    <?php $created_at=$rr['created_at']; ?>
                 
                 
                   
                 
                 

                 
  <?php }

$defaultlatitude= -33.840282;
$defaultlongitude= 151.207474;
$theta= (($defaultlongitude) - ($longitude));
$dist=sin(deg2rad($defaultlatitude))*sin(deg2rad($latitude)) + cos(deg2rad($defaultlatitude))*cos(deg2rad($latitude))*cos(deg2rad($theta));
$dist=acos($dist);
$dist=rad2deg($dist);
$miles=$dist * 60 *1.1515;
$unit=strtoupper($unit);

if($unit=="K"){
	return round($miles*1.609344,2). "km";

}
elseif($unit=="M"){
	return round($miles*1609.344,2). "Meters";
}
else{
	return round($miles,2)."miles";
}
}
$address_1='Insert start address';
$address_2='Insert start address';
$distance=getDistance($address_1,$address_2,'K');
$distance2= $distance*1000;
$rawtime= $distance/65;
//echo $rawtime;
if($rawtime<1){
	$time= $rawtime*60   ."mins";
}
elseif($rawtime>1){
	$hours=round($rawtime,0);
	$mins= round(($rawtime- $hours)*60,2);
	$time= $hours ."hrs". $mins."mins";

}
else{
	$time="hrs";
}
if(isset($_POST["submit_address"])){

$address=($_POST["address"]);
$address= str_replace("", "+", $address);
if(empty($address)){  
					$address=$location_address;
				}
				else{
					$address=($_POST["address"]);
					$address= str_replace("", "+", $address);
				}

?>


<p style="color:green;font-weight: bold;"> The map of <?php echo $address;?></p>
<div class="map" style="border:1px solid blue; padding:5px ; border-radius:5px;background-image: url('duncan.png')">
	<div class="details" style="display: inline-flex; justify-content: space-between;width: 100%;margin-left: 2%;">
		<form method="POST" style="display: inline-flex; justify-content: space-between;">
	<P>
		<input type="text" name="address" placeholder="Enter address"value="<?php echo $address?>" style="margin-top:none; height: 30px;">
	</P>
	<input type="submit" name="submit_address" style="height: 30px;">
	
	
</form>
		<form method="POST" style="display: inline-flex; justify-content: space-between;" style="position: center; margin-left:100%;">
	
	
	
	<input type="button" name="save" value="VIEW CLIENT"  class="btn btn-primary"data-toggle="modal" data-target="#exampleModal" style="margin-top: none;" >
	
	
</form>	<p id="" style="background: grey; position: right;margin-right: 10%; text-align: center; height:50px; width: 20%;"> Date Time<br> <small style="text-align: center;font-weight: none;"> <?php echo $today ?></small> <small id="clockDisplay" style="text-align: center;font-weight: none;" ></small>
	
	

</p>

</div>
	<div class="details" style="display: inline-flex; justify-content: space-between;width: 94.9%;margin-top:none;margin-left: 1%;border: 1px solid grey;border-bottom: none;padding-left: 10px;font-size: 14px;">
		<div class="location " >
	<P style="font-weight:none;">
		<p> ADDRESS  :<small style="text-align: center;font-weight: none;"><?php echo $location_address?></small><br>LONGITUDE  :<small style="text-align: center;font-weight: none;" ><?php echo $longitude?></small><br> LATITUDE :<small style="text-align: center;font-weight: none;"> <?php echo $latitude ?></small><br></p>
		
	</P>
	
	
	
</div>
		<div class="location " >
	<P style="font-weight:none;">
		<p> APPRO-DIST  :<small style="text-align: center;font-weight: none;"><?php echo $distance ?></small><br> SPEED :<small style="text-align: center;font-weight: none;" >65km/hr</small><br>TIME  :<small style="text-align: center;font-weight: none;" ><?php echo $time ?></small></p>
		
	</P>
	
	
	
</div>	<div class="location " style="margin-right: 10%;" >
	<P style="font-weight:none;">
		<p>  Ordered at :<small style="text-align: center;font-weight: none;"><?php echo $created_at;?></small><br>Count-down :<small id="demo" style="text-align: center;font-weight: none;" ></small><br> Deadline :<small style="text-align: center;font-weight: none;">04:02:2021</small><br></p>

		
	</P>
	
	
	
</div>
	</div>
<iframe width="95%" margin-left="10%" height="500"src="https://maps.google.com/maps?q=<?php echo $address;?>&output=embed" style="margin-left: 1%;height: 70%;margin-top: ;"></iframe>

</div>


<?php
}
?>
<form method="POST">
	<P>
		<input type="text" name="address" placeholder="Press the button to continue">
	</P>
	<input type="submit" name="submit_address">
</form>
<script>

// Set the date we're counting down to
var countDownDate = new Date("<?php echo $created_at ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
function renderTime(){
		var currentTime= new Date();
		var diem="AM";
		var h= currentTime.getHours();
		var m= currentTime.getMinutes();
		var s= currentTime.getSeconds();
		if(h==0){
			h=12;

		}else if(h>12){
			h= h-12;
			diem= "PM";
		}
		if(h<10){
			h="0" +h;
		}
		if(m<10){
			m="0" +m;
		}
		if(s<10){
			s="0" +s;
		}
		var myClock= document.getElementById('clockDisplay');
		myClock.textContent=h+":" + m + ":" + s + " " + diem;
		myClock.innerText= h+":" + m + ":" + s + " " + diem;
		setTimeout('renderTime()',1000);
		


	}
	renderTime();
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document" style="width: 70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: green;text-align:center;margin-left: 30%;">CLIENT INFORMATION</h5  >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     

<head>

  <!-- <link rel="stylesheet" href="../css/mountainn.css"> -->
   <link rel="stylesheet" href="../css/styles1.css">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
  <title></title>
</head>
<body style="background-color: white;">


 <?php if(isset($_session['message'])): ?>
 <div class ='msg' style="width: 70%; margin-left: 10%; text-align: center;">
  <?php
  echo $_session['message'];
  unset($_session['message']);
  ?>
  <img src="../public/images/icon_success1.gif" alt="image" class="photo" style="width: 90px; height: 90px;border-radius: 300px; margin-top: 1px;background: orange;">
</div>

<?php endif ?>
<?php 
include "static.php";
$count = 1;
$result=mysqli_query($dbhandle,"SELECT *FROM customer where email_address='$id' ORDER BY email_address LIMIT 1 "); ?>

	<div class="row" style="background-image: url('duncan.png')">
		
		<div class="col-md-5 offset-md-4" >
		<!-- Default form login -->
		<form class="text-left  border-light p-5" action="changedetail.php" method="post" style="margin-top:5px;height:20%;">
			<?php while ($row=mysqli_fetch_array($result)){
          ?>
			
			<img src="icons/neutral avatar.svg" style="height: 40%; width: 80%; margin-left: none;margin-top:2%;margin-bottom: 5%; border-radius: 10px;none;">
        
          <div class="contact" style="margin-left: 20%;"> <a href="https://wa.me/<?php echo $row['phone_number'];  ?>" style="width: 20px; height: 30px;">  <img src="icons/whatsapp-svgrepo-com.svg" alt="whatsapp" class="social-icon"></a>
            <a href="<?php echo $row['email_address'];  ?> " style="width: 20px; height: 30px;">  <img src="icons/gmail-svgrepo-com.svg" alt="gmail" class="social-icon">  </a>
            <a href=" <?php echo $row['phone_number'];  ?>" style="width: 20px; height: 30px;"> <img src="icons/phone-svgrepo-com.svg" alt="phone" class="social-icon" style="width: 20px; height: 30px;"> </a></div>
          <tr style="margin-left: none;"><br><hr>
 
             <tr ><b>First Name:</b> <small><?php echo $row['first_name']; ?></small></tr><br>
            <tr ><b>Second Name:</b> <?php echo $row['last_name']; ?></tr><br>
             <tr > <b>Email:</b> <small><a href="<?php echo $row['email_address']; ?>"><?php echo $row['email_address']; ?></a></small></tr><br>
              <tr ><b>Phone number:</b> <small><?php echo $row['phone_number']; ?></small></tr><br>
               <tr ><b>Physical_Address:</b> <small><?php echo $row['physical_address']; ?></small></tr><br>
                
               <tr style="text-align: center;margin-left: 40%;"><a href="generatereport.php?service_Id=<?php echo $row['email_address'];?>" class= "edit-btn" style="text-align: center;"> Generate statement</a></tr>
               
             </tr>
           <?php }?>
      

    </form>

</div>
</div>
</div>
</div>
      
      

  <!-- scripts -->
   <script type="text/javascript" src="add/js/jquery.min.js"></script>
   <script type="text/javascript" src="add/js/popper.min.js"></script>
    <script type="text/javascript" src="add/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="add/js/mdb.min.js"></script>
    <script type="text/javascript" src="add/js/app.js"></script>




