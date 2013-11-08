<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");
	 
	 if(!isset($_POST))
	 {
	 	echo $_POST['invited_friends'];
	 }
	 else if(isset($_GET['event']))
	 {
	 
	 $event_ID = $_GET['event'];
	 
	 echo "Hier k&ouml;nnen Freunde eingeladen werden.<br><br>";
	 
	 $result = select_db("user", "*", ["1"]);
	 
	 echo "<form method='post' id='invite_friends_form' action='content/event_invite.php'>";
	 while ($row = mysql_fetch_assoc($result)) {
	 					if(!($_SESSION['user_ID'] == $row['user_ID']))
						{
                         	echo '<input type="checkbox" id="invited_friends" value="'.$row['user_ID'].'" name="invited_friends">  '.$row['first_name'].' '.$row['last_name'].'<br>';
						}
	         }
?>
	<br><button type="submit">Einladen</button>
	</form>
<?php
	}
?>