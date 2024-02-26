<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';


/*** Start Processing Submitted Form Above ***/
if( isset($_POST['payment_options']) && $_POST['payment_options'] != "" ) {

	$merchantid = "EP000514";	// Change to your merchant ID
	$vkey = "c26fbcf925f4d4102908c742f4d0dbe0";	// Change to your verify key

 	$rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$str_rand = substr(str_shuffle($rand), 0, 9);


 $your_orderid = "".$_POST['session_usr_id']."-".rand();
 

$StringToSign = "";
$StringToSign .= "purchase";
$StringToSign .= "\n";
$StringToSign .= "00000010";
$StringToSign .= "\n";
$StringToSign .= $your_orderid;
$StringToSign .= "\n";
$StringToSign .= "6017";
$StringToSign .= "\n";
$StringToSign .= $your_orderid;
$StringToSign .= "\n";
$StringToSign .= "2018-09-17T18:27:00+0700";

//echo $StringToSign;
//echo "inquiry<br>00000005<br>201803070001<br>6017<br>807400010001<br>2018-09-17T18:27:00+0700";
//echo "<br><br>";

//echo base64_encode(hash_hmac('sha256', $StringToSign, '3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=', true));
$signature = base64_encode(hash_hmac('sha256', $StringToSign, '3lN1j3/tpRwmgcQFoq9/pyzgP77aRY7MBFhEIfiXQZ4=', true));
// echo $signature;
	
	
	$url = 'https://bgtest.e2pay.co.id/bg/restful/purchase/game';
	$data = array(
	 "bankChannel" => "6017",
	 "bankId" => "00000010",
	 "bankRefNo" => "".$your_orderid."", // "202311150007",
	 "custAccNo" => "".$your_orderid."", // "1111111111",
	 "custId" => $_POST['session_usr_id'], // "081234000001",
	 "dateTrx" => "2018-09-17T18:27:00Z",
	 "payeeCode" => $_POST['payeeCode_1'],
	 "productCode" => $_POST['productCode_1']
	);	

	$encodedData = json_encode($data);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // only for localhost nih, krn gak ada SSLnya!
	$data_string = urlencode(json_encode($data));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','date:2018-09-17T18:27:00+0700','authorization:".$signature."'));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
	$result_prepaidProduct = curl_exec($curl);
	// Check the return value of curl_exec(), too
	if ($result_prepaidProduct === false) {
		throw new Exception(curl_error($curl), curl_errno($curl));
	}
	// Check HTTP return code, too; might be something else than 200
	$httpReturnCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	echo $result_prepaidProduct;

	$json_decoded = json_decode($result_prepaidProduct, true);
	$data_responses = $json_decoded["data"];
	
	
	
	// SUCCESS RETURNnya :
	/*
	$data_responses = array(
		"billRefNo" => "1167866",
		"infoText" => "",
		"bankRefNo" => "202311150007",
		"code" => "0",
		"serialNumber" => "6952449031961004",
		"payeeCode" => "10014",
		"resultCode" => "00",
		"description" => "Game Voucher",
		"secretCode" => "4990146840341575",
		"expirydDate" => "",
		"dateTrx" => "2023-11-15T11:40:00Z",
		"message" => "Success",
		"bankChannel" => "6017",
		"custAccNo" => "1111111111",
		"bankId" => "00000010",
		"custRefNo" => "100004262851",
		"productCode" => "1001",
		"custId" => "081234000001",
		"nominalVoucher" => "11000.00"
	);
	*/
	

	if(1=1) {
	//if($data_responses['message'] == "Success") {
			
		$a = DB::query("update purchase_items set purchase_status='Success', purchase_time=now() where order_id=%s", $your_orderid);

		//echo "<script>window.location.href='purchase-item-success.php?sid=".$_POST['session_usr_id']."&idx".$your_orderid."';</script>";
		
	} // if($data_responses['message'] == "Success") {
		
	else { // Payment SUCCESS, but Purchase Fail : run Refund mechanism as below :
		/*
			* Setiap user punya 1 account "DOMPET VIRTUAL" masing2 di aplikasi Alter (let say kita nyebutnya User Wallet). 
			* User Wallet ini gw auto-created per user tiap kali user Sign Up.

			In case terjadi kasus API Payment SUKSES, trus API Purchase Item GAGAL :

			* Saldo User Wallet akan bertambah sejumlah nominal transaksi tsb.
			* di page User Wallet, ada button WITHDRAW.
			* Kalo si user pencet button WITHDRAW itu, akan masuk ke data Withdraw Request.
			  - Disini langsung diinfo ke user (kasih disclaimer) kalau proses penarikan dana (misalkan) hanya akan dilakukan setiap jam 5 sore setiap harinya.
			  - Request withdraw (misalkan) setelah jam 5 sore, akan diproses keesokan harinya.
			* Di belakang layar, admin alter akan memproses Request2 Withdraw ini secara transfer manual setiap harinya. Request2 yang udah ditransfer manual, saldo User Walletnya akan balik lagi jadi 0.
		*/
		
		$mpsvcode = md5($_POST['total_amount'].$merchantid.$your_orderid.$vkey);
		
		DB::insert('purchase_item_refund', [
		  'user_id' => $_SESSION["session_usr_id"],
		  'str_rand' => $str_rand,
		  'order_id' => $your_orderid,
		  'mpsvcode' => $mpsvcode,
		  'payee_code' => $_POST['payeeCode_1'],
		  'product_code' => $_POST['productCode_1'],
		  'name' => $_POST['name_1'],
		  'description' => $_POST['description_1'],
		  'type' => $_POST['type_1'],
		  'nominal' => $_POST['nominal_1'],
		  'client_price' => $_POST['clientPrice_1'],
		  'payment_method' => $_POST['xpayment_method'],
		  'currency' => $_POST['currency'],
		  'total_amount' => $_POST['total_amount'],
		  'payment_status' => 'Success',
		  'purchase_status' => '-',
		  'status' => 'Active',
		]);

		$b = DB::query("update purchase_items set user_wallet = user_wallet + ".$_POST['total_amount']." where order_id=%s", $your_orderid);
		
		//echo "<script>window.location.href='purchase-item-fail.php?sid=".$_POST['session_usr_id']."&idx".$your_orderid."';</script>";
		
		/*
		echo "<script>
			alert('Your purchase item was failed. We have done refund to your balance.');
			window.location.href='purchase-item-fail.php?sid=".$_POST['session_usr_id']."&idx".$your_orderid."';
		</script>";
		*/
		
	} // else { // Payment SUCCESS, but Purchase Fail : run Refund mechanism
	
	
		
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
					
			'mpscancelurl'	  => "https://dev2.alterspace.gg/purchase-item-payment-fail.php",
			//'mpsreturnurl'    => "https://dev2.alterspace.gg/razer_return.php",
			'mpsreturnurl'    => "https://dev2.alterspace.gg/purchase-item-payment-success.php?sid=".$_POST['session_usr_id']."&id1=".$str_rand."&id2=".$your_orderid."",
			// id1 --> str_rand ; id2 --> order_id
			
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