
<?php
 
$update= false;

   $db = mysqli_connect('localhost', 'root', '', 'libbuilder');
   $user=mysqli_query( $db,"UPDATE comment SET status='READ' ") or die(mysqli_error($con));
    

    header("location:viewcomment.php");

?>