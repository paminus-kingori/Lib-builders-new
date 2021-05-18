<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include "static.php";
	$id=$_GET['service_Id'];
	$username=$id;

    $update=true;
    $con= new mysqli('localhost','root', '', 'libbuilder');
    $result = mysqli_query($con, "SELECT * FROM admin where username='$username'");
        while($row = mysqli_fetch_array($result))
            {
              $username=$row['username'];
                $firstname=$row['first_name'];
                $lastname=$row['last_name'];
                $role=$row['role'];
                $password=$row['password'];
                 $profile=$row['profile_pic'];
                
            }
?>
<br>
<br>
<?php global $nam; echo $nam; ?>
<?php global $error; echo $error; ?>

<div class="container">
	<div class="row">
		<div class="col-md-5 offset-md-4">
		<!-- Default form login -->
		<form class="text-center border border-light p-5" action="changedetail.php" method="post">
<p class="h4 mb-4" style="font-size: 15px;color: orange;"><?php echo $username?>.</p>
			<p class="h4 mb-4" style="font-size: 15px;color: orange;">Edit Details.</p>
			<div class="el-card-avatar el-overlay-1">
			<a href="uploadPic.php?service_Id=<?php echo $username;?>">
			<img src="images/<?php echo $profile ?>" style="height: 20%; width: 60%; margin-left: none;margin-top: 5%;margin-bottom: 5%; border-radius: 70px;"><br></a>
<a href="logout.php"> <img src="icons/img.svg" alt="connections" style="width: 30px;"><br><small>logout</small></a>
			<!-- Email -->
			<input type="hidden" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="username" value="<?php echo $username ?>">
			<input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Firstname" name="firstname" value="<?php echo $firstname ?>">
			<input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Lastname" name="lastname"value="<?php echo $lastname ?>">

<!-- Password -->
<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password" value="<?php echo $password ?>">





<!-- Sign in button -->
<button class="btn btn-warning btn-block my-4" type="submit" name="submit">UPDATE</button>

<!-- Register -->


</form>
</div>
</div>
<!-- Default form login -->
</div>








<script type= "text/javascript" >
 var frmvalidator = new Validator("myform");
 frmvalidator.addValidation("firstname","req","Please enter student firstname");
 frmvalidator.addValidation("firstname","maxlen=50");
 frmvalidator.addValidation("lastname","req","Please enter student lastname");
 frmvalidator.addValidation("lastname","maxlen=50");
 frmvalidator.addValidation("username","req","Please enter student username");
 frmvalidator.addValidation("username","maxlen=50");
 frmvalidator.addValidation("password","req","Please enter student password");
 frmvalidator.addValidation("password","minlen=6","Password must not be less than 6 characters.");

</script>
