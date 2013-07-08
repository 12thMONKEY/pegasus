<?php
	if(!defined('__ROOT__'))
    {
             define('__ROOT__', dirname(dirname(__FILE__)));
    }
    require_once(__ROOT__ ."/utils/functions.php");
	
	##########################################################################
	
	#get the participants of the conversation
	$conversation_partner = $_GET['user'];
	$user_ID = $_SESSION['user_ID'];
	
	$get_messages_query = 	"	SELECT * FROM messages WHERE
								user_conversation_lookup.conversation_ID = messages.conversation_ID
								AND user_conversation_lookup.userID = $user_ID
								AND user_conversation_lookup.userID = $conversation_partner
							";
	
	$get_user_query = "SELECT last_name, first_name FROM user WHERE user_ID = $conversation_partner";
	$get_user_result = mysql_query($get_user_query);
	
	$user_data = mysql_fetch_row($get_user_result);
	
	$conversation_partner_name = $user_data[1].' '.$user_data[0];	
	
	$get_conversation_query = "	SELECT conversations.conversation_ID FROM user_conversations_lookup, conversations, user  
								WHERE user.user_ID = $user_ID
								AND user.user_ID = user_conversations_lookup.user_ID
								AND user_conversations_lookup.conversation_ID = (
								SELECT user_conversations_lookup.conversation_ID 
								FROM user_conversations_lookup, conversations, user  
								WHERE user.user_ID = $conversation_partner
								AND user.user_ID = user_conversations_lookup.user_ID
								AND conversations.conversation_ID = user_conversations_lookup.conversation_ID) 
								AND user_conversations_lookup.conversation_ID = conversations.conversation_ID" ;
								
	$get_conversation_result = mysql_query($get_conversation_query);
	if(mysql_num_rows($get_conversation_result)>0)
	{
		 $conversation_ID_array = mysql_fetch_row($get_conversation_result);
		 $fetched_conversation_ID = $conversation_ID_array[0];
	}
	else
	{
		$fetched_conversation_ID = '';
	}
	if ($_POST) {
		$message_text = htmlspecialchars($_POST['message_text']);
		$conversation_ID = $_POST['conversation_ID'];
		$user_ID = $_SESSION['user_ID'];
		$send_date = date('Y-m-d H:i:s');
		
		if ($conversation_ID=='') {
			$create_conversation_query = "INSERT INTO conversations VALUES (NULL, '$send_date')";
			$create_conversation_result = mysql_query($create_conversation_query);
			$lookup_query = "INSERT INTO user_conversations_lookup VALUES ($user_ID, LAST_INSERT_ID()),($conversation_partner, LAST_INSERT_ID())";
			$lookup_result = mysql_query($lookup_query);
		}
		
		$save_message_query = "INSERT INTO messages VALUES (NULL, '$message_text', '$send_date', '$user_ID', '0', LAST_INSERT_ID())";
		
		$save_message_result = mysql_query($save_message_query);
		
	} else {
?>
	<h1><?=$conversation_partner_name?></h1><br />
	<ul class="messages"></ul>
	<form action="<?=htmlspecialchars($_SERVER['PHP_SELF']."?user=$conversation_partner")?>" method="post" id="message_form">
		<textarea placeholder="Insert your message here..." rows="6" cols="50" name="message_text" id="message_text"></textarea><br />
		<input type="hidden" value="<?=$fetched_conversation_ID?>" id="conversation_ID"/>
		<button type="submit" id="message_submit">Senden</button>
	</form>
<?php 
	}
?>