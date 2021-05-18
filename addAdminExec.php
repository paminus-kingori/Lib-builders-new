 
<?php
include ('Dbconnection.php');

       
               
	$username= $_POST['username'];
  $firstname = $_POST['first_name'];
  $lastname=$_POST['last_name'];
	$role=$_POST['role'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];

 $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $error=0;
    $result = mysqli_query($con, "SELECT * FROM admin WHERE username= '$username'");
        


            if(mysqli_num_rows($result)>0){
             echo "<div class='alert alert-danger tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:;color:red;'>Kindly Use a different Email Address<br>
             .<img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='manageAdmin.php'>Home</a></div>";
             $error = 1;
            }

       
        if(empty($firstname) or (empty($lastname)) or (empty($image)) or (empty($password))){
        
         echo "<div class='alert alert-danger tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:;color:red;'>Please go back and fill all the fields.
          <br>
             .<img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='manageAdmin.php'>Home</a></div>";
          $error = 1;

        }

        else{
  $sql = "SELECT * FROM admin WHERE username='$username'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0)
          {
            $erremail="A user with this userName address already exists!";
            $error = 1;
            
          }
        }
        if ($password!==$password1) {
          echo "<div class='alert alert-danger tex-center' style='width: 30%; margin-left: 34%;margin-top: 5%;text-align:center; background-color:;color:red;'>The Two Passwords do not match;<br>
          Kindly confirm and Enter Again.
          <br>
             .<img src='icons/icon_error1.gif' alt='image' class='photo' style='width: 20px; height: 20px;border-radius: 300px; margin-top: 1px;' style='align-text:center;'><br> <a href='manageAdmin.php'>Home</a></div>";

          $error = 1;

        }
          

      if (count($error == 0)){
 move_uploaded_file($image_tmp,"C:\\wamp\\www\\dun3\\images\\$image");
    
	$user=mysqli_query($con,"INSERT INTO admin(username,first_name,last_name, password,profile_pic,role) VALUES ('$username','$firstname','$lastname','$password' ,'$image','$role' )") or die(mysqli_error($con));

   if ($user){
    header("Location:manageAdmin.php");
   }
   else{
   	echo"failed to execute";
   }
 }

?>
<head>
     <link rel="stylesheet" href="./css/mountains.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/add.css">

    <title>Update Product</title>
    <style>
      .error{
        color: #ff726f;
        margin-left: 40%;
        padding: none;
        border-bottom: none;
        border-top: none;
        border-left: 1px solid red;
        border-right: 1px solid red;
        font-size: 10px;
        text-align: center;


      }
      .success{
        color: #90ee90;
      }
      .Error{
        color: #ff726f;
        background: white;
        border-radius: ;
        width: 30%;
       padding: 5px;
       align-items: center;
        border-bottom: none;
        border-top: none;
        border-left: 1px solid red;
        border-right: 1px solid red;
      
      }
      
    </style>
  </head>

