<?php
require("connect_db.php");
$email = mysql_real_escape_string($_REQUEST['email']);
$password = mysql_real_escape_string($_REQUEST['password']);

$query = "INSERT INTO user VALUES (NULL, 'Mustermann', 'Max', 1, '".$email."', '".$password."', '2000-02-19',0,0,0)";

$result = mysql_query($query);

if ($result) {
         echo "Thanks for using US";
} else {
         echo "An error occured, please try it again!".mysql_error();
}

mysql_close($link);
?>