<?php
require("connect_db.php");
$email = mysql_real_escape_string($_REQUEST['email']);
$password = mysql_real_escape_string($_REQUEST['password']);

$result = mysql_query("SELECT * FROM user WHERE email = '".$email."'");
$row = mysql_fetch_array($result);
if ($row['password'] == $password)
{

         $query = "UPDATE user SET status = 1 WHERE email = '".$email."'";

         $update_status = mysql_query($query);

         $_SESSION['login'] = 1;

         $_SESSION['user_ID'] = $row['user_ID'];

         include('../content/user_interface.php');
}
else
{
         echo "Login invalid";
}

mysql_close($link);
?>