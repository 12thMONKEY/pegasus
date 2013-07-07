<?php
	if(!defined('__ROOT__'))
    {
             define('__ROOT__', dirname(dirname(__FILE__)));
    }
    require_once(__ROOT__ ."/utils/functions.php");
	
	##########################################################################
	
?>
	<ul class="users">
		<?php
			$get_users_query = "SELECT user_ID, last_name, first_name FROM user";
			$get_user_result = mysql_query($get_users_query);
			
			while ($row = mysql_fetch_assoc($get_user_result)) {
				echo '<a href="content/send_message.php?user='. $row['user_ID'] .'" data-change="main">'.$row['first_name']. " " .$row['last_name'].'</a><br />';
			}
		?>
	</ul>
