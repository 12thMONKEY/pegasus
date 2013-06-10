<?php
require_once("connect_db.php");
$email = mysql_real_escape_string($_REQUEST['email']);
$password = mysql_real_escape_string($_REQUEST['password']);

$result = mysql_query("SELECT * FROM user WHERE email = '".$email."'");
$row = mysql_fetch_array($result);
if($row['counter'] < 5)
{
     if ($row['password'] == $password)
     {
             if($row['status'] == 0)
             {
                   $query = "UPDATE user SET status = 1, counter = 0 WHERE email = '".$email."'";

                   $update_status = mysql_query($query);

                   $_SESSION['login'] = 1;

                   $_SESSION['user_ID'] = $row['user_ID'];

                   include('../content/user_interface.php');
             }
             else
             {
                   echo "Already Logged in!";
             }
     }
     else
     {
              echo "Login invalid for ".$email;

              $pw_counter = $row['counter'];
              $pw_counter = $pw_counter + 1;

              $query = "UPDATE user SET counter = ".$pw_counter." WHERE email = '".$email."'";
              $update_status = mysql_query($query);

              echo "<br>This is your ".$pw_counter.". invalid login!";
     }
}
else
{
        echo "Your account '".$email."' was disabled. Check your emails!";
        # The following lines send the email. This does not work on localhost.
        # $subject = "Invalid login at pegasus";
        # $mailtext = "Dear ".$row['first_name'].", \n \n you had too many invalid logins. Your account was disabled! \n \n Your sincerly \n pegasus project Team";
        # mail($email, $subject, $mailtext, "From: pegasus_project ");
}

mysql_close($link);
?>