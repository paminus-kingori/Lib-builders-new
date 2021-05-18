<?php
if(!isset($_SESSION)) {
session_start();
   include('Dbconnection.php');
$id = $_GET['equipment_id']; 
$equipment_id=$id;
$query= mysqli_query($con, "select count(*) as total from hire");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
$today=date("jY /",time());
  //initilalize variables
 

  $first_name="";
  $last_namename="";
  $email_address="";
  $physical_address="";
  $phone_number="";
  $physical_address="";
  $quantity="";
  $Latitude="";
  $Longitude="";
  $order_date="";
  $status='incomplete';
  $code = rand(1000, 9999);
  $hire_id= $today.'_'.$code.$count;
  $hire_number= 'N'.'_'.$today.$count;
 $today1=date('Y-m-d');


  }
        include('static.php');

  
    ?>
    <div class="container">
      <div class="row">
        

   </div>
<?php



       //$id = $_REQUEST['asp_id'];

//getting userid of the data from url




//$sql=mysqli_query($con,'SELECT * FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'" AND status="voted"');


 $result = mysqli_query($con, "SELECT * FROM equipment where rawequ_id='$id'");
    while($row = mysqli_fetch_array($result))
      {
        $image=$row['profile_pic'];

          // $service_Id= $row['service_Id'];
           $service_tag= $row['equipment_name']; 
           $service_description=$row['description']; 
            $available_space= $row['quantity']; 
             
              $price=$row['unit_price']; 
               
          
      }
    


if(isset($_POST['book'])){
  $email_address=$_POST['email_address'];
    $physical_address=$_POST['physical_address'];
    $Longitude=$_POST['address2'];
    $Latitude=$_POST['address1'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $phone_number=$_POST['phone_number'];
     $quantity=$_POST['quantity'];
   
   
    $end_date=$_POST['end_date'];
    $id=$_GET['equipment_id'];
  
      $check= mysqli_query($con, "SELECT * FROM hire WHERE  rawequ_id='$id' and rawcust_id='$email_address' and status= 'incomplete'")or die(mysqli_error($con));
      if(mysqli_num_rows($check)>0){
    echo" You are already hired this equipment<br>
    Or you have'nt returned the equipment you hired.
    You need to pay and return the equipment you hired first. ";
  exit();

  $result = mysqli_query($con, "SELECT * FROM equipment where rawequ_id='$id'");
    while($row = mysqli_fetch_array($result))
      {
        $image=$row['profile_pic'];

          // $service_Id= $row['service_Id'];
           $service_tag= $row['equipment_name']; 
           $service_description=$row['description']; 
            $available_space= $row['quantity']; 
             
              $price=$row['unit_price']; 
               
          
      }
      

}
        
$total_price= $price*$_POST['quantity'];
 $hire1=mysqli_query($con,"INSERT INTO hire(rawcust_id,hire_id, rawequ_id,hire_number,total_price,date_hired, deadline, status) VALUES ('$email_address','$hire_id','$id' ,'$hire_number','$total_price','$today1','$end_date', '$status')");
     $order2=mysqli_query($con,"INSERT INTO customer(email_address, phone_number,first_name,last_name,physical_address,latitude,longitude) VALUES ('$email_address','$phone_number','$first_name' ,'$last_name','$physical_address', '$Latitude','$Longitude')");
    $order3=mysqli_query( $con,"UPDATE equipment SET quantity=quantity-1 WHERE equipment_id = '$id'")or die(mysqli_error($con));
    if($order1=true and $order2=true and $order3=true){
    $_session['message']="You hired successfully.";
    echo "<div class='alert alert-success tex-center' style='margin-top:5px; width:30%; margin_left:50%;'>You hired successfully<br> Check your email for confirmation and receipt.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br><a href='hire.php'>Home</a></div>
                ";
  }
 

else{
    echo "Error: ".$order1."<br />". $con->error;
    }

        }
else{
            $service = "select * from equipment where rawequ_id='$id'";
            $results = $con->query("$service");
            $service = $results->fetch_assoc();
            $service_tag= $service['equipment_name'];
            $service_Id = $service['rawequ_id'];

                echo "
                <body style=''>
            <form class='border border-light p-5' method='post' style='background:; border-radius:5px;padding: 5px;margin_left:10%;border: 1px solid  orange;margin-top:10%;'>
<div class='input'>
<p style='margin_left:50%;text-align:center;'> Enter Your Details..</p>
      <input  class='border border-light p-2' type='text' id='email_address' name='email_address' placeholder='Enter your email..' required>

            <input class='border border-light p-2' type='text' id='first_name' name='first_name' placeholder='Enter your first name..'required style='background:; border-radius:5px;margin_left:10%;'>
            <input  class='border border-light p-2' type='text' name='last_name' placeholder='Enter your last name.'>
            <input class='border border-light p-2' type='number'  name='phone_number' placeholder='Enter your phone number..'>
             
              <input  class='border border-light p-2' type='date' name='end_date' placeholder='Enter today day'>
             <input  class='border border-light p-2' type='text' name='physical_address' placeholder='Enter your physical_address.' required>
              <input  class='border border-light p-2' type='number' name='quantity' placeholder='Enter your number of items you want..' required>
              <input  class='border border-light p-2' type='text' id='address1' name='address1' placeholder='8.90099' >
               <input class='border border-light p-2' type='text' id='address2' name='address2' placeholder='6.899900'>
            
     
    </div>
                <div class='text-center' style='font-weight:light;' >
                    You have resolved to Hire Equipment ;<br><p style='color:orange;'>Equipment: <tt class='font-italic font-weight-small' style='color:black;'> $service_tag</tt><br>Registration N0.  :<tt class='font-italic font-weight-bold' style='color:black'>$service_Id</tt>.</p><br> Are you sure?
                    <div class='text-center mt-2'>
                    
                        <a href='equipment.php' class='btn btn-success'style='width:;'>Cancel</a>
                        <button type='submit' name='book' id='delete' value='book' style='width:10%;height:6.5%;' class='btn btn-warning'/>Hire</button> 
                    </div>
                </div>
            </form> </body> ";
        }
?>

<!DOCTYPE html>
<html>
<head>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
      .error{
        color: #ff726f;
      }
      .success{
        color: #90ee90;
      }
     input{
        color:black;
        border-radius: 5px;
        border: 1px solid blue;
        margin-top: 3px;
        margin-left: 2%;
        width: 20%;
        height:5%;
        font-family: Arial, Helvetica, sans-serif;
        background: white;
        font-weight: small;
        font-size:10px;
      }
      .input{
        color:grey;
       
       
        margin-top: 2px;
        margin-left: 2%;
      }
    </style>
    <script type="text/javascript">
    const email_address = document.querySelector('#email_address');
   email_address.addEventListener('focus', () => {
      navigator.geolocation.getCurrentPosition(function(position) {
      let lat = position.coords.latitude;
      let long = position.coords.longitude;
      address1.value = ` ${lat}`;
       address2.value = `${long}`;
    });
    })
  </script>
  
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title></title>
</head>
<body>

</body>
</html>