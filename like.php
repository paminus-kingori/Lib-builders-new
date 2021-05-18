
<?php
 $id=$_GET['service_Id'];
$update= false;

   $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
   $user=mysqli_query( $db,"UPDATE article SET likes=likes+1 WHERE count_id='$id'") or die(mysqli_error($con));
    

    header("location:blog.php");

?>