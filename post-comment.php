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

	$post =  DB::queryFirstRow("SELECT * FROM posts WHERE id=%s ", $_POST['id_post']);

	if($post['posted_by'] != $_SESSION["session_usr_id"]) {

		$comment = explode(" ", $_POST['comment_post']);

		DB::insert('notification', [
			'category' => 'post-comment',
			'notif_for' => $post['posted_by'],
			'notif_from' => $_SESSION["session_usr_id"],
			'title' => 'Commented: '.$comment[0]. "....",
			'data' => $post['id']
			]);
	}



    return true;
?>