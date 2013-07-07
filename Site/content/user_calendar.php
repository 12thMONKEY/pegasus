<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");
     $this_month = date('m');
     $this_year = date('Y');
     $result = mysql_query("SELECT * FROM `user` , `events` , `user_events_lookup` WHERE user.user_ID = ".$_SESSION['user_ID']." AND user.user_ID = user_events_lookup.user_ID AND user_events_lookup.event_ID = events.event_ID AND events.start_month = ".$this_month." AND events.start_year = ".$this_year);

     while ($row2 = mysql_fetch_assoc($result)) {
         echo "<b>".$row2['subject']."</b><br>";
         echo $row2['describtion']."<br>";

         echo 'Von: '.$row2['start_day'].'.'.$row2['start_month'].'.'.$row2['start_year'].' '.$row2['start_time']."<br>";

         echo 'Bis: '.$row2['end_day'].'.'.$row2['end_month'].'.'.$row2['end_year'].' '.$row2['end_time']."<br>";

         echo $row2['location']."<br><br>";
         $events = array($row2['event_ID'] => array('subject' => $row2['subject']));
         echo $events['3']['subject'];
     }

     $montharray = ['Januar','Februar','M&auml;rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'];
     $dayarray = ['Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','Sonntag'];
     $timestamp = time();
     $thisMonth = date('m', $timestamp);
     $thisYear = date('Y', $timestamp);


     echo '<table border=1 width="100%"><tr height="100px"><td colspan=7 valign="middle" align="center" >'.$montharray[$thisMonth-1].'</td></tr>';
     echo '<tr height="50px">';
     for($k = 0;$k < 7 ; $k++)
     {
         echo '<td valign="middle" align="center" >'.$dayarray[$k].'</td>';
     }
     echo '</tr>';

     $firstday = mktime(0,0,0,$thisMonth,1,$thisYear);
     $startMonth = date('w', $firstday);
     $monthlenght = date('t', $firstday);


     $h = -$startMonth+2;
     for($j = 0; $j < 6 ; $j++)
     {
         echo '<tr height="150px" >';
         for($i = 0; $i < 7; $i++)
         {
                 if(($h > 0) && ($h <= $monthlenght))
                 {
                         echo '<td width="180px" valign="top" align="right">'.$h.'</td>';
                 }
                 else
                 {
                         echo '<td width="180px" valign="top" align="right"> </td>';
                 }
                 $h = $h + 1;
         }
         echo '</tr>';
     }
     echo '</table>';
?>