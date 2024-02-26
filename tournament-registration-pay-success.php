<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';

 
$_SESSION["session_usr_id"] = $_GET['sid'];
 
 
$array_users_name = array();
$array_users_email = array();
$array_users_username = array();
$results_A = DB::query("SELECT * FROM users");
foreach ($results_A as $row_A) {
	$array_users_name[$row_A['id']] = "".$row_A['name']."";
	$array_users_email[$row_A['id']] = "".$row_A['email']."";
	$array_users_username[$row_A['id']] = "".$row_A['username']."";
} // foreach ($results_A as $row_A) {
//echo $array_users_username[$row_A['id']];

$array_cities = array();
$results_A = DB::query("SELECT * FROM cities order by name asc");
foreach ($results_A as $row_A) {
	$array_cities[$row_A['id']] = "".$row_A['name']."";
} // foreach ($results_A as $row_A) {
//echo $array_users_username[$row_A['id']];

$array_games = array();
$results_A = DB::query("SELECT * FROM games order by id asc");
foreach ($results_A as $row_A) {
	$array_games[$row_A['game_name_id']] = "".$row_A['name']."";
} // foreach ($results_A as $row_A) {
//echo $array_users_username[$row_A['id']];


/*
 $your_orderid = "".$_POST['team_codex']."-".$_POST['xpayment_method']."-".rand()."";
 orderID ori :: 7jyiMZNRIq-e2Pay_DANA-11964604977jyiMZNRIq-18sN2DiLlcd-1633137452
 
 
$vkey ="c26fbcf925f4d4102908c742f4d0dbe0"; //Replace with your Razer Verify Key
echo "tranID :: " . $_POST['tranID'];
echo "<br>";
echo "orderid :: " . $_POST['orderid'];
echo "<br>";
echo "status :: " . $_POST['status'];
echo "<br>";
echo "domain :: " . $_POST['domain'];
echo "<br>";
echo "amount :: " . $_POST['amount'];
echo "<br>";
echo "currency :: " . $_POST['currency'];
echo "<br>";
echo "appcode :: " . $_POST['appcode'];
echo "<br>";
echo "paydate :: " . $_POST['paydate'];
echo "<br>";
echo "skey :: " . $_POST['skey'];

 $your_orderid = "".$_POST['team_codex']."-".$_POST['xpayment_method']."-".rand()."";
 orderID ori :: 7jyiMZNRIq-e2Pay_DANA-11964604977jyiMZNRIq-18sN2DiLlcd-1633137452
 
 
tranID :: 212043
orderid :: T1257065669-7-7jyiMZNRIq
status :: 00
domain :: EP000514
amount :: 55000.00
currency :: IDR
appcode ::
paydate :: 2023-12-21 15:08:15
skey :: 01e03084b8072876c0ee8568ec35acbc



http://localhost:8001/tournament-registration-pay-success.php

$orderID_ori = "".$_POST['team_codex']."-".$_POST['xpayment_method']."-".rand()."-".$_POST['session_usr_id']."";
orderID ori :: 783u56ejUn-e2Pay_DANA-423541866
 
*/


$orderid_expl = explode("-",$_POST['orderid']);
$team_codex = $orderid_expl[0];
$xpayment_method = $orderid_expl[1];
$rand = $orderid_expl[2];

$results_team = DB::queryFirstRow("SELECT * FROM tournament_teams where team_code=%s", $team_codex);

$results_tournament = DB::queryFirstRow("SELECT * FROM tournament where tournament_code=%s", $results_team['tournament_code']);

$fixed_order_id = "T".$team_codex."-".$rand."-".$results_team['tournament_code']."";
//echo "fixed_order_id :: " . $fixed_order_id;
// fixed_order_id :: T783u56ejUn-423541866-18zeUxwhg2s




	
/*
// Setiap ada user/team yang SUDAH SUKSES BAYAR utk Join Turnamen, langsung kasih email notif ke Tournament Creator-nya klo ada user yang sudah bayar & join!
*/	


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'librarysmtp/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.titan.email';                     //hostname/domain yang dipergunakan untuk setting smtp
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'teguh@alterspace.gg';                  //SMTP username
    $mail->Password   = 'sys.admin3';                           //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('teguh@alterspace.gg', 'ALTER');
    $mail->addAddress("".$array_users_email[$results_tournament['creator_user_id']]."", '');     //email tujuan
    //$mail->addReplyTo('teguh@alterspace.gg', 'ALTER Mail'); //email tujuan add reply (bila tidak dibutuhkan bisa diberi pagar)
    //$mail->addCC('teguh@alterspace.gg'); // email cc (bila tidak dibutuhkan bisa diberi pagar)
    //$mail->addBCC('teguh@alterspace.gg'); // email bcc (bila tidak dibutuhkan bisa diberi pagar)

    //Attachments
    #$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
	
	$to = "".$array_users_email[$results_tournament['creator_user_id']].""; 
	$from = "teguh@alterspace.gg"; 
	$fromName = 'A.L.T.E.R'; 
	 
	$subject = "[ALTER] User/Team ".$results_team['team_name']." has been successfully joined ".$results_tournament['name']."";  
	 
	$htmlContent = " 
    <html> 
    <head> 
        <title>User/Team ".$results_team['team_name']." has been successfully joined ".$results_tournament['name']."</title> 
    </head> 
    <body> 
        <h1>User/Team ".$results_team['team_name']." has been successfully joined ".$results_tournament['name']."</h1> 
        <table cellspacing='0' style='border: 2px dashed #FB4314; width: 100%;'> 
            <tr> 
                <th>Tournament Name :</th><td>".$results_tournament['name']."</td> 
            </tr>
            <tr> 
                <th>Team/User Name :</th><td>".$results_team['team_name']."</td> 
            </tr> 			
            <tr> 
                <th>Number of Team Players :</th><td>".$results_tournament['players_per_team']."</td> 
            </tr> 
            <tr> 
                <th>Total Payment Paid :</th><td><b>IDR ".number_format($results_tournament['participant_fee'])."</b></td> 
            </tr> 
            <tr> 
                <th>Payment Method :</th><td><b>".$results_team['payment_method']."</b></td> 
            </tr>
            <tr> 
                <th>Payment Time :</th><td><b>".$results_team['payment_timestamp']."</b></td> 
            </tr>			
        </table> 
    </body> 
    </html>"; 
		
	
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $htmlContent;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
	//echo "<script>window.location.href='otp-verification.php?mail=".$_POST['email']."'</script>";
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/theme.css" />
    <script src="js/script.js"></script>
    <title>Payment Confirmation - Alter</title>
  </head>

  <body>
    <section>
      <div class="container px-4">
        <div class="py-3">
          <a href="payment.html">
            <i class="bi bi-x-lg fs-5 me-2"></i>
            <span>Payment Confirmed</span>
          </a>
        </div>
        <form action="">
          <div
            class="d-flex flex-column align-items-center justify-content-center"
          >
            <img
              src="assets/ilustration/ilus__check-success.png"
              alt=""
              class="w-50"
            />
            <h5 class="text__purple mb-0">Payment Succesful!</h5>
            <span class="text-secondary">Enjoy your tournament</span>
          </div>
          <!-- Summary Start -->
          <div class="p-3 bg-dark rounded-3 mt-5">
            <h5>Summary</h5>
            <div class="mt-3 d-flex flex-column gap-1">
			             
			  <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Tournament Name</span>
                <span class="text-light fs-5"><?php echo $results_tournament['name']; ?></span>
              </div>

			  <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Your (Team) Name</span>
                <span class="text-light fs-5"><?php echo $results_team['team_name']; ?></span>
              </div>

			  <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Number of Team Players</span>
                <span class="text-light fs-5"><?php echo $results_tournament['players_per_team']; ?></span>
              </div>

              <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Total Paid</span>
                <span class="text-light fs-5">IDR <?php echo number_format($results_tournament['participant_fee']); ?></span>
              </div>
              
			  <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Payment Method</span>
                <span class="text-light fs-5"><?php echo $xpayment_method; ?></span>
              </div>			  
              
			  <div class="d-flex flex-row align-items-center justify-content-between text-secondary">
                <span>Payment Time</span>
                <span class="text-light fs-5"><?php echo $_POST['paydate']; ?></span>
              </div>
			  
            </div>
          </div>
          <!-- Summary End -->
          <a
            href="tournament.php"
            class="btn btn-outline-light rounded-pill my-4 w-100"
          >
            Confirmed
          </a>
        </form>
      </div>
    </section>
  </body>
</html>
