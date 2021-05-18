<?php
include('loginerror.php');
?>


        
        
        
<?php
//including the database connection file
include("classes/Crud.php");
include('Dbconnection.php');

 

//getting userid of the data from url
  

  
    
                    
        $order3=mysqli_query( $con,"UPDATE article SET likes=(likes-likes)")or die(mysqli_error($con));

if ($order3) {
   
   echo "<div class='alert alert-success tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center;'>Article Deleted Successfully.<img src='icons/action_check.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='addarticle.php'>Home</a></div>
               ";
                 header("Location:admin.php");
}
else{
    echo "Error: ".$order3."<br />". $con->error;
    }

       
