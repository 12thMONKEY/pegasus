<?php
        if (!isset($_SESSION)) {
                session_start();
        }

        require_once("connect_db.php");


        function selectUserData()
        {
                 $result = mysql_query("SELECT * FROM user WHERE user_ID = '" . $_SESSION['user_ID'] . "'");
                 global $row;
                 $row = mysql_fetch_array($result);
        }
?>