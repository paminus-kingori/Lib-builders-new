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
  
    
                    
        $users=mysqli_query($con ,"DELETE FROM hire WHERE rawhir_id='$id'");

if ($users) {
   
   echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center;'>Article Deleted Successfully.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='addarticle.php'>Home</a></div>
               ";
                 header("Location:notifications.php");
}
else{
    echo "Error: ".$users."<br />". $con->error;
    }

       
