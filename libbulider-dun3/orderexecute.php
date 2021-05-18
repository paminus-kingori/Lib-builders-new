<?php
if(!isset($_SESSION)) {
session_start();
   include('Dbconnection.php');
$id = $_GET['material_id']; 
$material_id=$id;
$query= mysqli_query($con, "select count(*) as total from myorder");
$result1 = mysqli_fetch_array($query);



$count = ($result1['total']+1 );
$today=date("jY",time());
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
  $order_id= $today.$code.$count;
  $order_number= 'N'.$today.$count;

 $today=date('Y-m-d');

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


 $result = mysqli_query($con, "SELECT * FROM material where rawmat_id='$id'");
    while($row = mysqli_fetch_array($result))
      {
        $image=$row['profile_pic'];

          // $service_Id= $row['service_Id'];
           $service_tag= $row['material_name']; 
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
   
   
    $id=$_GET['material_id'];
  
      $sql= mysqli_query($con, "SELECT * FROM myorder WHERE  rawmat_id='$id' and email_address='$email_address'")or die(mysqli_error($con));
      if(mysqli_num_rows($sql) > 0 ) {
        echo" <div  id='msg'class='alert alert-warning tex-center' style='width:30%; margin-left:35%; text-align: center; margin-top: 5%;color:red;'>You already ordered this type of items<br> Kindly pay and collect the following items before placing another order;<img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br><a href='material.php'>Home</a></div> ";
  
    exit();
}
  $result = mysqli_query($con, "SELECT * FROM material where rawmat_id='$id'");
    while($row = mysqli_fetch_array($result))
      {
        $image=$row['profile_pic'];

          // $service_Id= $row['service_Id'];
           $service_tag= $row['material_name']; 
           $service_description=$row['description']; 
            $available_space= $row['quantity']; 
             
              $price=$row['unit_price']; 
               
          
      }
      



    $check= mysqli_query($con, "SELECT *FROM material WHERE rawmat_id='$id' ")or die(mysqli_error($con));
     $result1 = mysqli_fetch_array($check);
      $maximum = ($result1['quantity']); 
     if(($maximum)<$quantity){
    echo" <div class='alert alert-warning tex-center' style='width:30%; margin-left:35%; text-align: center; margin-top: 5%;color:red;'>You have exceeded the number of items we have in our store<br> Kindly order $maximum  items.<img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br><a href='material.php'>Home</a></div> ";
  exit(); 
  }   
$total_price= $price*$_POST['quantity'];
$quantity=$_POST['quantity'];
 $order1=mysqli_query($con,"INSERT INTO myorder(email_address,order_id, rawmat_id,order_number,order_date,quantity,total_price, status) VALUES ('$email_address','$order_id','$id' ,'$order_number','$today','$quantity','$total_price', '$status')");
     $order2=mysqli_query($con,"INSERT INTO customer(email_address,phone_number,first_name,last_name,physical_address,latitude,longitude) VALUES ('$email_address','$phone_number','$first_name' ,'$last_name','$physical_address', '$Latitude','$Longitude')");
    $order3=mysqli_query( $con,"UPDATE material SET quantity=quantity-$quantity WHERE rawmat_id = '$id'")or die(mysqli_error($con));
    /*require_once 'mailer/PHPMailer.php';

$mail = new PHPMailer(true);
$mailid = $_POST['email_address'];;
$subject = "Thank u";
$text_message = "Hello";
$message = "Thank You for Ordering with us.";

try
{
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = '465';
$mail->AddAddress($mailid);
$mail->Username ="pyrummanyali@gmail.com";
$mail->Password ="@pyrummanyali";
$mail->SetFrom('pyrummanyali@gmail.com','Pyrum');
$mail->AddReplyTo("pyrummanyali@gmail.com","Pyrum");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{
echo "Thank you for Buying with us u got a notification through the mail you provide";
}
}
catch(phpmailerException $ex)
{
$msg = "".$ex->errorMessage()."";
}*/
    if($order1=true and $order2=true and $order3=true ){
    $_session['message']="You ordered successfully.";
    echo "<div id='msg' class='alert alert-success tex-center' style='width:30%; margin-left:35%; text-align: center; margin-top: 5%;'>You ordered Successfully<br> Check your email for confirmation and receipt.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br><a href='material.php'>Home</a></div>
 <script>

    setTimeout(function(){
      document.getElementById('msg').style.dispay='none';
    },3000);
  </script>
                ";
  }
 

else{
    echo "Error: ".$order1."<br />". $con->error;
    }

        }



else{
            $service = "select * from material where rawmat_id='$id'";
            $results = $con->query("$service");
            $service = $results->fetch_assoc();
            $service_tag= $service['material_name'];
            $service_Id = $service['rawmat_id'];

                echo "
                <body style=''>
            <form class='border border-light p-5' method='post' style='background:; border-radius:5px;padding: 5px;margin_left:10%;border: 1px solid  orange;margin-top:10%;'>
<div class='input'>
<p style='margin_left:50%;text-align:center;'> Enter Your Details..</p>
      <input  class='border border-light p-2' type='text' id='email_address' name='email_address' placeholder='Enter your email..' required>

            <input class='border border-light p-2' type='text' id='first_name' name='first_name' placeholder='Enter your first name..'required style='background:; border-radius:5px;margin_left:10%;'>
            <input  class='border border-light p-2' type='text' name='last_name' placeholder='Enter your last name.'>
            <input class='border border-light p-2' type='number'  name='phone_number' placeholder='Enter your phone number..'>
             
              
             <input  class='border border-light p-2' type='text' name='physical_address' placeholder='Enter your physical_address.' required>
              <input  class='border border-light p-2' type='number' name='quantity' placeholder='Enter your number of items you want..' required>
              <input  class='border border-light p-2' type='text' id='address1' name='address1' placeholder='8.90099' >
               <input class='border border-light p-2' type='text' id='address2' name='address2' placeholder='6.899900'>
            
               
            
     
    </div>
                <div class='text-center' style='font-weight:light;' >
                    You have resolved to order item ;<br><p style='color:orange;'>Material_Tag: <tt class='font-italic font-weight-bold' style='color:black;'> $service_tag</tt><br>Registration N0.  :<tt class='font-italic font-weight-bold' style='color:black'>$service_Id</tt>.</p><br> Are you sure?
                    <div class='text-center mt-2'>
                    
                        <a href='material.php' class='btn btn-success'style='width:;'>Cancel</a>
                        <button type='submit' name='book' id='book' value='book' style='width:10%;height:6.5%;' class='btn btn-warning'/> Order </button> 
                    </div>
                </div>
            
    
  
</form></body> ";
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


  

    setTimeout(function(){
      document.getElementById('msg').style.dispay='none';
    },3000);
  </script>
  </script>
  
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title></title>
</head>
<body>
 

</body>
</html>