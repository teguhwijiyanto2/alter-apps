<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';
	
	DB::insert('post_comments', [
	  'post_id' => $_POST['id_post'],
	  'comment' => $_POST['comment_post'],
	  'reply_comment_id' => $_POST['reply'] ? $_POST['reply'] : null,
	  'posted_by' => $_SESSION["session_usr_id"],
	  'posted_at' => date("Y-m-d H:i:s"),
	]);


    return true;
?>