<?php
	if(!defined('__ROOT__'))
    {
             define('__ROOT__', dirname(dirname(__FILE__)));
    }
    require_once(__ROOT__ ."/utils/functions.php");
	
	##########################################################################
	
	$conversation_partner = $_GET['user'];
	
	$get_user_query = "SELECT last_name, first_name FROM user WHERE user_ID = $conversation_partner";
	$get_user_result = mysql_query($get_user_query);
	
	$user_data = mysql_fetch_row($get_user_result);
	
	$conversation_partner_name = $user_data[1].' '.$user_data[0];	
	
	if ($_POST) {
		$message_text = htmlspecialchars($_POST['message_text']);
		$conversation_ID = $_POST['conversation_ID'];
		$user_ID = $_SESSION['user_ID'];
		$send_date = date('Y-m-d H:i:s');
		
		if (empty($conversation_ID)) {
			echo 'wooop';
			$create_conversation_query = "INSERT INTO conversations VALUES (NULL, '$send_date')";
			$create_conversation_result = mysql_query($create_conversation_query);
		}
		
		$save_message_query = "INSERT INTO messages VALUES (NULL, '$message_text', '$send_date', '$user_ID', '0', '$conversation_ID')";
		
		$save_message_result = mysql_query($save_message_query);
		
	} else {
?>
	<h1><?=$conversation_partner_name?></h1><br />
	<ul class="messages"></ul>
	<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="message_form">
		<textarea placeholder="Insert your message here..." rows="6" cols="50" name="message_text" id="message_text"></textarea><br />
		<input type="hidden" value="" id="conversation_ID"/>
		<button type="submit" id="message_submit">Senden</button>
	</form>
<?php 
	}
?>