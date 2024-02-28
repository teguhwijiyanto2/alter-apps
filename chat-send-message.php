<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'db.class.php';

/*
CREATE TABLE IF NOT EXISTS `chat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chat_room_uuid` varchar(255) DEFAULT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `message` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
*/


/*
 <form action="chat-send-message.php" method="POST" id="formSendChatMessage">
	  <input type="hidden" name="chat_room_uuidx" value="<?php echo $_POST['chat_room_uuidx']; ?>">
	  <input type="hidden" name="receiver_idx" value="<?php echo $chat_with_id; ?>">

<input
              placeholder="Enter Message"
              class="bg-transparent border-0 w-100"
			  name="chat_message"
            />
			
<input type="file" id="fileInput" name="fileInput" hidden />			
			
              <input
                type="file"
                accept="image/*"
                id="imageInput"
                name="imageInput"
                hidden
              />			
			
<input
            placeholder="Enter Message (Optional)"
            class="bg-transparent border-0 w-100 py-1 text-white"
			name="post_text_caption"
          />
*/

	  
		  
		  
		  
		  
		  
if(isset($_POST['post_text_caption']) && strlen($_POST['post_text_caption']) > 0)  {
	$text_message = $_POST['post_text_caption'];
}	
else {
	$text_message = $_POST['chat_message'];
}	
		  


$fileName = "";
$uploadDirectory = "chat_files/";


if(isset($_FILES['fileInput']['name']) && strlen($_FILES['fileInput']['name']) > 3) {
	

    $errors_1 = []; // Store errors here
    $fileName_1 = $_FILES['fileInput']['name'];
    $fileSize_1 = $_FILES['fileInput']['size'];
    $fileTmpName_1  = $_FILES['fileInput']['tmp_name'];
    $fileType_1 = $_FILES['fileInput']['type'];
	$fileNameCleaned_1 = str_ireplace(" ","_",basename($fileName_1));
	
    $uploadPath_1 = $uploadDirectory . $fileNameCleaned_1; 
      if (empty($errors_1)) {
        $didUpload_1 = move_uploaded_file($fileTmpName_1, $uploadPath_1);
        if ($didUpload_1) {
          //echo "1 The file " . basename($fileName_1) . " has been uploaded";
		  	//DB::query("UPDATE chat set chat_file=%s where chat_room_uuid=%s", $fileNameCleaned_1, $_POST['chat_room_uuidx']);
		      $fileName = $fileNameCleaned_1;
        } else {
          //echo "2 An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors_1 as $error_1) {
          //echo $error . "These are the errors" . "\n";
        }
      }
} // if(isset($_FILES['fileInput']['name']) && strlen($_FILES['fileInput']['name']) > 3) {




if(isset($_FILES['imageInput']['name']) && strlen($_FILES['imageInput']['name']) > 3) {
	


    $errors_1 = []; // Store errors here
    $fileName_1 = $_FILES['imageInput']['name'];
    $fileSize_1 = $_FILES['imageInput']['size'];
    $fileTmpName_1  = $_FILES['imageInput']['tmp_name'];
    $fileType_1 = $_FILES['imageInput']['type'];
	$fileNameCleaned_1 = str_ireplace(" ","_",basename($fileName_1));
	
    $uploadPath_1 = $uploadDirectory . $fileNameCleaned_1; 
      if (empty($errors_1)) {
        $didUpload_1 = move_uploaded_file($fileTmpName_1, $uploadPath_1);
        if ($didUpload_1) {
          //echo "3 The file " . basename($fileName_1) . " has been uploaded";
		  	//DB::query("UPDATE chat set chat_file=%s where chat_room_uuid=%s", $fileNameCleaned_1, $_POST['chat_room_uuidx']);
		    $fileName = $fileNameCleaned_1;
        } else {
          //echo "4 An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors_1 as $error_1) {
          //echo $error . "These are the errors" . "\n";
        }
      }
} // if(isset($_FILES['imageInput']['name']) && strlen($_FILES['imageInput']['name']) > 3) {
	
	



	DB::insert('chat', [
	  'chat_room_uuid' => $_POST['chat_room_uuidx'],
	  'sender_id' => $_SESSION["session_usr_id"],
	  'message' => $text_message,
	  'receiver_id' => $_POST['receiver_idx'],
	  'is_read' => 0,
	  'chat_file' => $fileName	  
	]);
	
	$user_profile = DB::query("UPDATE chat_room set last_message_sender_id=%i, last_message=%s, last_message_created_on=now() where chat_room_uuid=%s", $_SESSION["session_usr_id"], $_POST['chat_message'], $_POST['chat_room_uuidx']);




	
	/*s
CREATE TABLE IF NOT EXISTS `chat_room` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chat_room_uuid` varchar(255) DEFAULT NULL,
  `chat_type` varchar(10) DEFAULT NULL,
  `user_id_1` bigint(20) DEFAULT NULL,
  `user_id_2` bigint(20) DEFAULT NULL,
  `group_chat_name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  `last_message_sender_id` bigint(20) DEFAULT NULL,
  `last_message` text,
  `last_message_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
*/	
	
	


	echo "
	<form action='chat.php' method='POST' id='formChatOpener'>
		<input type='hidden' name='chat_type' value='DM'>
		<input type='hidden' name='chat_room_uuidx' value='".$_POST['chat_room_uuidx']."'>
	</form>
	<body onload=\"document.getElementById('formChatOpener').submit();\">
	";


?>