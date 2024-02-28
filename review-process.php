<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';

/*
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id_profile` bigint(20) DEFAULT NULL,
   review_value int(11) default 0,
  `review_text` text,
  `posted_by` bigint(20) DEFAULT NULL,
  `posted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
*/

	//$_SESSION["session_usr_id"]
	 // POST

	DB::insert('reviews', [
	  'user_id_profile' => $_POST["uid"],
	  'review_value' => $_POST["review_value"],
	  'review_text' => $_POST["review_text"],
	  'posted_by' => $_SESSION["session_usr_id"],
	  'posted_at' => date("Y-m-d H:i:s")
	]);


$sum_1 = DB::queryFirstField("SELECT sum(review_value) FROM reviews where user_id_profile=%i", $_POST['uid']);
$count_1 = DB::queryFirstField("SELECT count(review_value) FROM reviews where user_id_profile=%i", $_POST['uid']);

$update_review_value = $sum_1 / $count_1;
$update_1 = DB::query("UPDATE users set review_value = $update_review_value where id=%i", $_POST['uid']);


	echo("
	<script language='javascript'>
	alert('Your review has been successfully submitted. Thank you.');
	window.location.href='profile.php?user_id_profile=".$_POST["uid"]."';
	</script>
	")


?>