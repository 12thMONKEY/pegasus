<?php
require_once("connect_db.php");
$email = mysql_real_escape_string($_REQUEST['email']);
$password = mysql_real_escape_string($_REQUEST['password']);

$result = mysql_query("SELECT * FROM user WHERE email = '".$email."'");
$row = mysql_fetch_array($result);
if ($row['password'] == $password)
{

         $query = "UPDATE user SET status = 1, counter = 0 WHERE email = '".$email."'";

         $update_status = mysql_query($query);

         $_SESSION['login'] = 1;

         $_SESSION['user_ID'] = $row['user_ID'];

         include('../content/user_interface.php');
}
else
{
         echo "Login invalid for ".$email;

         $pw_counter = $row['counter'];
         $pw_counter = $pw_counter + 1;

         $query = "UPDATE user SET counter = ".$pw_counter." WHERE email = '".$email."'";
         $update_status = mysql_query($query);

         echo "<br>Dies ist Ihr ".$pw_counter.". Fehlversuch!";
}

mysql_close($link);
?>