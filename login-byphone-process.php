<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';


$count = DB::queryFirstField("SELECT COUNT(*) FROM users where phone=%s AND password=%s order by id desc limit 0,1", $_POST['login_phone'], md5($_POST['login_password']));

if($count > 0) {

	$results_check = DB::queryFirstRow("SELECT * FROM users where email=%s AND password=%s order by id desc limit 0,1", $_POST['login_phone'], md5($_POST['login_password']));
	
	$_SESSION["session_usr_id"]=$results_check['id'];
	$_SESSION["session_usr_email"]=$results_check['email'];
	$_SESSION["session_usr_phone"]=$results_check['phone'];
	$_SESSION["session_usr_name"]=$results_check['name'];
	$_SESSION["session_usr_username"]=$results_check['username'];
	$_SESSION["session_usr_gender"]=$results_check['gender'];
	$_SESSION["session_usr_birthdate"]=$results_check['birthdate'];
	
	echo("
	<script language='javascript'>
	alert('Welcome to ALTER');
	window.location.href='home.php';
	</script>
	");
	
} // if($count > 0) {
	
else {
	echo("
	<script language='javascript'>
	alert('Invalid Phone Number / Password !!');
	window.location.href='login.php';
	</script>
	");	
}


?>