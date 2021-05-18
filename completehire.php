 <?php
session_start();


  $con = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query= mysqli_query($con, "select count(*) as total from hire");
$result1 = mysqli_fetch_array($query);
 //$order4=mysqli_query($con ,"DELETE FROM myorder WHERE  status='complete'");

$id = $_GET['service_Id']; 
$rawhir_id=$id;

$count = ($result1['total']+1 );
$today=date("jY",time());
  //initilalize variables
  
  //initilalize variables
  $first_name="";
  $last_name="";
  $rawcust_id="";
  $equipment_id="";
  $physical_address="";
  $phone_number="";
  $physical_address="";
  $quantity="";
  $Latitude="";
  $Longitude="";
  $order_date="";
  $status='complete';
  $code = rand(1000, 9999);
  $transaction_id= $today.$code.$count;
  $transaction_number= 'N'.$today.$count;
 

  
  $update= false;
  if(isset($_POST['commit'])){
   
     $transaction_date= '2021:04:.14';
    
 
           $category_id_query1=mysqli_query ($con,"SELECT * FROM hire where rawhir_id='$rawhir_id'")or die(mysqli_error($con));
     while($row = mysqli_fetch_array($category_id_query1)) { 
   
           $equipment_id=$row['rawequ_id'];
          $email_address=$row['rawcust_id'];
           $total_price=$row['total_price'];
           }
       
    
 $order1=mysqli_query($con,"INSERT INTO transaction(transaction_id,rawcust_id, rawmat_id,transaction_number,transaction_date,total_price, status) VALUES ('$transaction_id','$rawcust_id','$equipment_id' ,'$transaction_number','$transaction_date','$total_price', '$status')");
    
      $order3=mysqli_query( $con,"UPDATE hire SET status='complete' WHERE rawhir_id = '$rawhir_id'")or die(mysqli_error($con));
    
    if($order1=true and $order3=true){
   
    echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:#dff0d8;color:#3c763d;'>The Transaction completed successfully<br> A receipt has been send to the Email address provided.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='completeorder.php'>Home</a></div>
                ";
  }

else{
    echo "Error: ".$users."<br />". $con->error;
    }

        }
else{

            $services = "select * from hire where rawhir_id='$id'";
            $results = $con->query("$services");
            $product = $results->fetch_assoc();
            $service_tag= $product['hire_number'];
            $service_Id = $product['hire_id'];

                echo "
                <body class='ml-4 mr-4' style='margin-top: 10%; background: ;'>

        
            <form method='post'>

      
     
    
                <div class='text-center' style='background:;width:30%;position:center;margin-left:35%;padding-bottom:3px; border: 1px solid red'  >
                <h4 class='text-center' style='color:red;'>Confirm Transaction commit!</h4>
                <img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 30px; height: 30px;border-radius: ; margin-top: 3px; '><br>
                   You are about to complete:  <br>hire: <b>$service_tag</b>,<br>hire Id.  :<tt class='font-italic font-weight-bold'>$service_Id</tt>.<br> Are you sure?
                    <div class='text-center mt-2'>
                    
                        <a href='../components/comment.php' class='btn btn-success'>Cancel</a>
                        <input type='submit' name='commit' id='delete' value='commit'  class='btn btn-danger'/> 
                    </div>
                </div>
            </form> ";
        }
?>

<!DOCTYPE html>
<html>
<head>
  <style>
      .error{
        color: #ff726f;
      }
      .success{
        color: #90ee90;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title></title>
</head>
<body>

</body>
</html>  
           
    
  
<?php
    $category_query=mysqli_query ($con,"SELECT * FROM material");
    
    

?> 


