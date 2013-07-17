<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");
	 
	 $event_ID = $_GET['event'];
	 
	 echo "Hier kann der Termin bearbeitet werden.";
?>