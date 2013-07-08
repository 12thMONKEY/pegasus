<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");

     $event_ID = $_GET['event'];

     $result = mysql_query("     SELECT *
                                 FROM events
                                 WHERE event_ID = ".$event_ID
                         );
     $row2 = mysql_fetch_array($result);

     echo "<b>".$row2['subject']."</b><br><br>";
     echo $row2['describtion']."<br><br>";
     echo 'Von: '.$row2['start_day'].'.'.$row2['start_month'].'.'.$row2['start_year'].' '.$row2['start_time']."&nbsp;&nbsp;&nbsp;&nbsp;";
     echo 'Bis: '.$row2['end_day'].'.'.$row2['end_month'].'.'.$row2['end_year'].' '.$row2['end_time']."<br>";
     echo 'Location: '.$row2['location']."<br><br>";


?>