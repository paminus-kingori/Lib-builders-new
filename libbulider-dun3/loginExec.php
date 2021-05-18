<?php
session_start();
include "Dbconnection.php";
if(isset($_POST['login'])) {
$username = $_POST["username"];
$password = $_POST["password"];
$username = addslashes($username);
$password = addslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['role'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location:admin.php');
			
}

}

else {
	$error = "<center><h4 style='font-size: 12px;'><font color='#FF0000'>Incorrect Username or Password</h4></center></font>";
	include "adminlogin.php";
	}
}

?>
