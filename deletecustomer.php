<?php
include('loginerror.php');
?>


        
        
        
<?php
//including the database connection file
include("classes/Crud.php");
include('Dbconnection.php');

  $id = $_REQUEST['service_Id'];

//getting userid of the data from url
  
$id = $_GET['service_Id'];
   if (isset($_POST['delete'])){
    
                    
        $users=mysqli_query($con ,"DELETE FROM customer WHERE email_address='$id'");

if ($users) {
   
   echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center;'>Customer Deleted Successfully.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='viewuser.php'>Home</a></div>
               ";
}
else{
    echo "Error: ".$users."<br />". $con->error;
    }

        }
else{

            $services = "select * from customer where email_address='$id'";
            $results = $con->query("$services");
            $product = $results->fetch_assoc();
            $service_tag= $product['first_name'];
            $service_Id = $product['email_address'];

                echo "
                <body class='ml-4 mr-4' style='margin-top: 10%; background: ;'>

        
            <form method='post'>

      
     
    
                <div class='text-center' style='background:;width:30%;position:center;margin-left:35%;padding-bottom:3px; border: 1px solid red'  >
                <h4 class='text-center'>Confirm customer Deletion!</h4>
                <img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 30px; height: 30px;border-radius: ; margin-top: 3px; '><br>
                    You have requested to delete <br>material: <b>$service_tag</b>,<br> material_Id.  :<tt class='font-italic font-weight-bold'>$service_Id</tt>.<br> Are you sure?
                    <div class='text-center mt-2'>
                    
                        <a href='addequipment.php' class='btn btn-success'>Cancel</a>
                        <input type='submit' name='delete' id='delete' value='Delete'  class='btn btn-danger'/> 
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