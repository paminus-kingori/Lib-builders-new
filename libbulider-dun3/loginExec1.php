<?php
if(isset($_POST['send'])){
$username=($_POST['username']);
$password=($_POST['password']);



if($username='laveriah' and $password='pass123'){
	header('location:view.html');
}
else{
	echo 'Confirm and Enter Aganin';
}
}
?>