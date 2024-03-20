
<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';

//echo $_POST['user_id_profile'];

/*
selGame
datetime_play
selHours
notes


CREATE TABLE IF NOT EXISTS `matchmaking_availability` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requestor_id` bigint(20) DEFAULT NULL,
   game_name_id varchar(100) default null, 
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `num_of_hours` int(11) DEFAULT NULL,
   notes varchar(255) default null, 
  `approver_id` bigint(20) DEFAULT NULL,
  `is_read` varchar(1) default 0, 
  `approval_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
*/


	$option = DB::queryFirstRow("SELECT * FROM matchmaking_option WHERE user_id = %i",$_POST['user_id_profile']);

	// print_r($_POST);
	// exit;

	if($option && $option['fee'] != null) {
		DB::insert('matchmaking_availability', [
			'requestor_id' => $_SESSION["session_usr_id"],
			'game_name_id' => $_POST["selGame"],	  
			'date_time' => $_POST["datetime_play"],
			'num_of_hours' => $_POST["selHours"],
			'notes' => $_POST["notes"],  
			'approver_id' => $_POST['user_id_profile'],
			'is_read' => 0,
			'request_status' => 'PAYMENT_PENDING',
		]);

		echo "
			<form action='play-info-pay.php' method='POST' id='formX'>
				<input type='text' name='clientPrice_1' value='".$_POST['amount']."'>
				<input type='text' name='external_id' value='".DB::insertId()."'>
			</form>
			<body onload=\"document.getElementById('formX').submit();\">
			";

	}else {

		DB::insert('matchmaking_availability', [
			'requestor_id' => $_SESSION["session_usr_id"],
			'game_name_id' => $_POST["selGame"],	  
			'date_time' => $_POST["datetime_play"],
			'num_of_hours' => $_POST["selHours"],
			'notes' => $_POST["notes"],  
			'approver_id' => $_POST['user_id_profile'],
			'is_read' => 0,
			'request_status' => '-',
		]);
	}

	$play =  DB::queryFirstRow("SELECT * FROM `matchmaking_availability` WHERE requestor_id = %i AND approver_id = %i ORDER BY date_time DESC LIMIT 1", $_SESSION["session_usr_id"], $_POST['user_id_profile'] );

	DB::insert('notifications', [
		'category' => 'play-order',
		'notif_for' => $_POST['user_id_profile'],
		'notif_from' => $_SESSION["session_usr_id"],
		'title' => 'Incoming order from '.$_SESSION["session_usr_name"],
		'data' => $play['id']
	  ]);

	


/*
	echo "
	<script>
		window.location.href='tournament-registration-confirmation.php';
	</script>
	";
*/


	echo "
	<form action='profile.php' method='POST' id='formX'>
		<input type='text' name='user_id_profile' value='".$_POST['user_id_profile']."'>
	</form>
    <body onload=\"document.getElementById('formX').submit();\">
	";


?>