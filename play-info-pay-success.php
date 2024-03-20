<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';

if($_GET['id2'] == 'success') {

	DB::query("update matchmaking_availability set request_status='-' where id=%i ", $_GET["id3"]);
	
}
echo "
	<form action='my-order.php' method='POST' id='formX'>
		<input type='text' name='user_id_profile' value='".$_POST['user_id_profile']."'>
	</form>
	<body onload=\"document.getElementById('formX').submit();\">
	";


?>