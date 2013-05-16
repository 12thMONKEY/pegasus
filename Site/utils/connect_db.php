<?php
  $user_name = "root";
  $password = "";
  $database = "pegasus";
  $server = "localhost";

  $link = mysql_connect($server,$user_name,$password);

  //print "Connection to the Server opened";

  $db_found = mysql_select_db($database);

  if (!isset($_SESSION)) {
           session_start();
  }
?>