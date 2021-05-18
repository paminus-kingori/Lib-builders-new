 <?php
session_start();


  $con = mysqli_connect('localhost', 'root', '', 'libbuilder');
  $query= mysqli_query($con, "select count(*) as total from myorder");
$result1 = mysqli_fetch_array($query);
 //$order4=mysqli_query($con ,"DELETE FROM myorder WHERE  status='complete'");

$id = $_GET['service_Id']; 
$email = $_GET['email']; 
$raword_id=$id;

$count = ($result1['total']+1 );
$today=date("jY",time());
  //initilalize variables
  
  //initilalize variables

  $first_name="";
  $last_name="";
  $email_address="";
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
 

  $price=$_GET['price']; 
  $update= false;

  if(isset($_POST['commit'])){
   
     $transaction_date= date("Y-m-d");
   
 
           $category_id_query1=mysqli_query ($con,"SELECT * FROM myorder where raword_id='$raword_id'")or die(mysqli_error($con));
     while($row = mysqli_fetch_array($category_id_query1)) { 
   
           $material_id=$row['rawmat_id'];
          $email_address=$row['email_address'];
           $total_price=$row['total_price'];
           $paid=$row['paid'];
           $quantity=$row['quantity'];
           }
    $balance=$total_price-($paid+$price);
  
if($balance<=0){
  $status='complete';
  $order1=mysqli_query($con,"INSERT INTO transaction(transaction_id,rawcust_id, rawmat_id,transaction_number,transaction_date,quantity,total_price,balance, status) VALUES ('$transaction_id','$email_address','$material_id' ,'$transaction_number','$transaction_date','$quantity','$price','$balance', '$status')");
  $order4=mysqli_query( $con,"UPDATE myorder SET status='$status' , paid=paid+'$price' WHERE rawmat_id = '$material_id' AND email_address='$email_address'")or die(mysqli_error($con));


}
 else{
  $status='incomplete';
  $order3=mysqli_query( $con,"UPDATE myorder SET status='$status', paid=paid+'$price' WHERE rawmat_id = '$material_id' AND email_address='$email_address'")or die(mysqli_error($con));
  
  echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:#dff0d8;color:#3c763d;'>The order balance was updated successfully<br> complete payment to receive a receipt<br>
  You owe the company Ksh $balance/=<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br><a href='completeorder.php'style='text-decoration:none;'>Back</a>
   </div>
      <style>
      .error{
        color: #ff726f;
      }
      .success{
        color: #90ee90;
      }
    </style>
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>          ";
                exit();
 }   
    


   
    


    
    if($order1=true){
 //$order4=mysqli_query($con ,"DELETE FROM myorder WHERE  status='complete'");
            $services = "select * from myorder where raword_id='$id'";
            $results = $con->query("$services");
            $product = $results->fetch_assoc();
            $service_tag= $product['order_number'];
            $service_Id = $product['raword_id'];

   
    echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:#dff0d8;color:#3c763d;'>The Transaction completed successfully<br> A receipt has been send to the Email address provided.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='completeorder.php'style='text-decoration:none;'>Back</a><br>
    <a href='transaction.php?service_Id=$service_Id&price=$price' style='text-decoration:none;'>Print Receipt </a>
   </div>
                ";
                 
  

}
    
}



 
        
else{

            $services = "select * from myorder where raword_id='$id'";
            $results = $con->query("$services");
            $product = $results->fetch_assoc();
            $service_tag= $product['order_number'];
            $service_Id = $product['order_id'];

                echo "
                <body class='ml-4 mr-4' style='margin-top: 10%; background: ;'>

        
            <form method='post'>

      
     
    
                <div class='text-center' style='background:;width:30%;position:center;margin-left:35%;padding-bottom:3px; border: 1px solid red'  >
                <h4 class='text-center' style='color:red;'>Confirm Transaction commit!</h4>
                <img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 30px; height: 30px;border-radius: ; margin-top: 3px; '><br>
                   You are about to complete:  <br>Order: <b>$service_tag</b>,<br> Order Id.  :<tt class='font-italic font-weight-bold'>$service_Id</tt>.<br> Are you sure?
                    <div class='text-center mt-2'>
                    
                        <a href='completeorder.php' class='btn btn-success'>Cancel</a>
                        <input type='submit' name='commit' id='delete' value='commit'  class='btn btn-danger'/> 
                    </div>
                </div>
            </form>  ";
        }


    

/*$category_id_query7=mysqli_query($con,"SELECT * FROM transaction WHERE   rawcust_id='$email' AND status='incomplete'")or die(mysqli_error($con));
    if(mysqli_num_rows($category_id_query7)>0 ){
      echo'success';
    }
    else{
      echo'failed';


         $sql=mysqli_query($con,"SELECT * FROM transaction where rawmat_id='$material_id' and rawcust_id='$email'")or die(mysqli_error($con));
if(mysqli_num_rows($sql) < 0 ) {
   $remaining=$check-$price;
  if($remaining<0){
      $status='complete';
    }
    else{
      $status='incomplete';

    }
    }*/

        
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
           
    
  


