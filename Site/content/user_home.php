<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");
     selectUserData();


     $first_name = $row['first_name'];
     $last_name = $row['last_name'];
     $full_name = $first_name . ' ' . $last_name;
?>

Hallo
<?php
     echo $full_name;
?>

