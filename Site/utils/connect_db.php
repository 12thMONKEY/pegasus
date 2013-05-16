<?php
  $user_name = "root";
  $password = "";
  $database = "pegasus";
  $server = "localhost";

  mysql_connect($server,$user_name,$password);

  //print "Connection to the Server opened";

  $db_found = mysql_select_db($database);

  session_start();

?>