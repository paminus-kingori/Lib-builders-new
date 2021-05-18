
<?php
 $id=$_GET['service_Id'];
$update= false;

   $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
   $user=mysqli_query( $db,"UPDATE comment SET status='READ' WHERE count_id='$id'") or die(mysqli_error($con));
    

    header("location:viewcomment.php");

?>