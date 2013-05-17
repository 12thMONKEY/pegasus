<?php
	
	#So that the path works in every environment + from every file that includes the file
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/utils/connect_db.php'); 
	
	#require_once("utils/connect_db.php");
	
	$result = mysql_query("SELECT * FROM user WHERE user_ID = '".$_SESSION['user_ID']."'");
	$row = mysql_fetch_array($result);
	
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
?>
<div class="testDIV">
   Hallo 
     <?php
     	echo $first_name.' '.$last_name;
     
         if ($_SESSION['login'] == 1) {
         	echo '<br><a href="#" class="logout">Logout biiitch!</a>';
         }
     ?>
</div>

<?php

?>