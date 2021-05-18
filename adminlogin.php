	<?php require_once('static.php');
		if(!isset($_SESSION)) {
		session_start();
		}
		if (isset($_SESSION['SESS_NAME'])!="") {
			header("Location: admin.php");
		}
	?>
    <body style="background-image: url('.png');">
	<br>
	<center>
	<legend> <h3 style="color: orange;font-family:helvetica;font-size: 15px;">LOGIN TO LIB HOME BULDERS </h3></legend>
	<br>
	</center>
	<?php global $nam; echo $nam; ?>
	<?php global $error; echo $error; ?>
	<br>


		<div class="container" style="border: none;">
			<div class="row">
				<div class="col-md-5 offset-md-4">
				<!-- Default form login -->
				<form class="text-center border border-light p-5" action="loginExec.php" method="post">
<img src="LIB3.png" alt="project" class="icon" style="width: 130px; height: 90px; border-radius: 50px;">
    			<p class="h4 mb-4">Sign in</p>

    			<!-- Email -->
    			<input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="username" style="border-color: orange;">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password" style="border-color: orange;">
   
        
    

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>
    <!-- Sign in button -->
    <button class="btn btn-warning btn-block my-4" type="submit" name="login">Sign in</button>

    <!-- Register -->
    

</form>
</div>
</div>
<!-- Default form login -->
</div>
</body>