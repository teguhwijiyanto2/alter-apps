
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