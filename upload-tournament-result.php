<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';


$errors_1 = []; // Store errors here
$fileName_1 = $_FILES['img-tournament']['name'];
$fileSize_1 = $_FILES['img-tournament']['size'];
$fileTmpName_1  = $_FILES['img-tournament']['tmp_name'];
$fileType_1 = $_FILES['img-tournament']['type'];

$fileNameCleaned_1 = str_ireplace(" ","_",basename($fileName_1));
$fileNameFix_1 = $fileNameCleaned_1;

if(strlen($fileNameCleaned_1) > 3) {	
$uploadPath_1 = "tournament_result/" . $fileNameFix_1; 
  if (empty($errors_1)) {
    $didUpload_1 = move_uploaded_file($fileTmpName_1, $uploadPath_1);
    if ($didUpload_1) {
      //echo "The file " . basename($fileName_1) . " has been uploaded";
    } else {
      //echo "An error occurred. Please contact the administrator.";
    }
  } else {
    foreach ($errors_1 as $error_1) {
      //echo $error . "These are the errors" . "\n";
    }
  }
} // if(strlen($fileNameCleaned_1) > 3) {

  DB::insert('tournament_result', [
    'tournament_id' => $_POST['tid'],
    'result_1' => isset($_POST['wining'][0]) ? $_POST['wining'][0] : '',
    'result_2' => isset($_POST['wining'][1]) ? $_POST['wining'][1] : '',
    'result_3' => isset($_POST['wining'][2]) ? $_POST['wining'][2] : '',
    'result_image' => $fileNameFix_1
  ]);

	DB::query("UPDATE tournament SET status='Finished' WHERE id = '".$_POST['tid']."'");


  echo("
  <script language='javascript'>
  alert('Success upload result..')
  window.location.href='myorder.php';
  </script>
  ");

?>