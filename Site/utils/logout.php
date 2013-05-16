<?php

require("connect_db.php");

  session_destroy();
  include('../content/login_screen.php');

  mysql_close($link);
?>