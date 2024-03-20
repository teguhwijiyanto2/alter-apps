<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';


/*** Start Processing Submitted Form Above ***/
if( isset($_POST['payment_options']) && $_POST['payment_options'] != "" ) {


/*		
			$merchantid = "EP000514";	// Change to your merchant ID
			$vkey = "c26fbcf925f4d4102908c742f4d0dbe0";	// Change to your verify key
*/		

			$merchantid = "EP000270";	// PROD
			$vkey = "b3a34cb9f6d51812fba0112b282df01a";	// PROD



		$rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$str_rand = substr(str_shuffle($rand), 0, 9);

		$your_orderid = "".$_POST['session_usr_id']."".rand();
 
		$mpsvcode = md5($_POST['total_amount'].$merchantid.$your_orderid.$vkey);
		
		$params = array(
			'status'          => true,	// Set True to proceed with Razer
			'mpsmerchantid'   => $merchantid,
			'mpschannel'      => $_POST['payment_options'],
			'mpsamount'       => $_POST['total_amount'],
			'mpsorderid'      => $your_orderid,
			'mpsbill_name'    => $_POST['billingFirstName']." ".$_POST['billingLastName'],
			'mpsbill_email'   => $_POST['billingEmail'],
			'mpsbill_mobile'  => $_POST['billingMobile'],
			'mpsbill_desc'    => $_POST['billingAddress'],
			'mpscountry'      => "MY",
			'mpsvcode'        => md5($_POST['total_amount'].$merchantid.$your_orderid.$vkey),
			'mpscurrency'     => $_POST['currency'],
			'mpslangcode'     => "en",
			//'mpsextra'     	  => base64_encode("1#mpd_tonton:10.00"),
			'mpstimer'	      => isset($_POST['razertimer']) ?(int)$_POST['razertimer'] : '',
			'mpstimerbox'	  => "#counter",
					
			'mpscancelurl'	  => "https://beta.alterspace.gg/play-info-pay-success.php?sid=".$_POST['session_usr_id']."&id1=".$str_rand."&id2=fail&id3=".$_POST['external_id'],
			//'mpsreturnurl'    => "https://beta.alterspace.gg/razer_return.php",
			'mpsreturnurl'    => "https://beta.alterspace.gg/play-info-pay-success.php?sid=".$_POST['session_usr_id']."&id1=".$str_rand."&id2=success&id3=".$_POST['external_id'],  
			
			/*
			'mpscancelurl'	  => "http://localhost:8001/cancel_order.php",
			//'mpsreturnurl'    => "http://localhost:8001/razer_return.php",
			'mpsreturnurl'    => "http://localhost:8001/tournament-registration-pay-success.php?sid=".$_POST['session_usr_id']."",			
			*/
			
			'mpsapiversion'   => "3.28"		
		);			
			
	echo json_encode( $params );
	exit();

} // if( isset($_POST['payment_options']) && $_POST['payment_options'] != "" ) {
?>