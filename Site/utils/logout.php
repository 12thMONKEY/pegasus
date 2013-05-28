<?php

require("connect_db.php");

  $user_ID = $_SESSION['user_ID'];

  $query = "UPDATE user SET status = 0 WHERE user_ID = '".$user_ID."'";

  $update_status = mysql_query($query);

  session_destroy();

  include('../content/login_screen.php');

  mysql_close($link);
?>