<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User.css">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/add.css">

    <title>View User</title>
</head>
<body>
<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
form{
  margin-left: 30%;
}

</style>
<?php
    include('Dbconnection.php');
    include_once("classes/Constant.php");
  
    $id=$_GET['edit'];
    $update=true;
    $result = mysqli_query($con, "SELECT * FROM admin where username='$id'");
        while($row = mysqli_fetch_array($result))
            {
              $username=$row['username'];
                $firstname=$row['first_name'];
                $lastname=$row['last_name'];
                $password=$row['password'];
                $role=$row['role'];
               
                
            }
      

?>

<form action="EditAdminExec.php" method="post" >

    <h4> ADMIN Information</h4>
    <hr>
    <input type="hidden" name="username" value="<?php echo $username ?>">
       <a href="#"> 
         <img src="icon/icon_edit.png" alt="image" class="photo" style="width: 50px; height: 50px;border-radius: 300px; margin-top: 3px;"></a>
         <br>
         <!-- <h style="font-size: 10px;
         color:#003366;
          font-family:'calibri', Gadget, myriad;
         font-weight: small;"> -->
        </a>
        <br>
        First Name:<br>
        <input type="text" name="firstname" value="<?php echo $firstname ?>" class="ed">
        <br>
    Last Name:<br><input type="text" name="lastname" value="<?php echo $lastname ?>" class="ed"><br>
    Password:<br><input type="password" name="password" value="<?php echo  $password?>" class="ed"><br>
  Role:<br><input type="text" name="role" value="<?php echo $role?>" class="ed"><br>
    
   
    <input type="submit" value="Edit" id="button1">
    <div class="key" style="align-items: center; display: inline flex; background-color: ;">
   
    <?php 
$count = 1;
$result=mysqli_query($con,"SELECT *FROM category"); ?>

        
       </div>
   
</form>
</body>
</html>

