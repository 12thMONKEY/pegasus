<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");

     $this_month = date('m');
     $this_year = date('Y');
     $montharray = ['Januar','Februar','M&auml;rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'];
     $dayarray = ['Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','Sonntag'];
     $firstday = mktime(0,0,0,$this_month,1,$this_year);
     $startMonth = date('w', $firstday);
     $monthlenght = date('t', $firstday);

     $result = mysql_query("     SELECT 'event_ID', start_day, start_time, subject, end_year, end_month, end_day, end_time
                                 FROM user , events , user_events_lookup
                                 WHERE user.user_ID = ".$_SESSION['user_ID']."
                                 AND user.user_ID = user_events_lookup.user_ID
                                 AND user_events_lookup.event_ID = events.event_ID
                                 AND events.start_month = ".$this_month."
                                 AND events.start_year = ".$this_year."
                                 ORDER BY events.start_time ASC"
                         );

     while ($row2 = mysql_fetch_assoc($result)) {

         $x = 0;
         if(!isset ($events[$row2['start_day']][$x]))
         {
                 $x = 0;
         }
         else
         {
                 $x = count($events[$row2['start_day']]);
         }
         $time = $row2['start_time'];
         $timearray = explode(':', $time);
         $start_time = date('H:i', mktime($timearray[0],$timearray[1],0,1,1,1970));

         $time = $row2['end_time'];
         $timearray = explode(':', $time);
         $end_time = date('H:i', mktime($timearray[0],$timearray[1],0,1,1,1970));

         $events[$row2['start_day']][$x] = array(
                                                 'event_ID' => $row2['event_ID'],
                                                 'subject' => $row2['subject'],
                                                 'start_time' => $start_time,
                                                 'end_year' => $row2['end_year'],
                                                 'end_month' => $row2['end_month'],
                                                 'end_day' => $row2['end_day'],
                                                 'end_time' => $end_time
                                                 );
     }

     echo '<table border=1 width="100%"><tr height="100px"><td colspan=7 valign="middle" align="center" >'.$montharray[$this_month-1].'</td></tr>';
     echo '<tr height="50px">';
     for($k = 0;$k < 7 ; $k++)
     {
         echo '<td valign="middle" align="center" >'.$dayarray[$k].'</td>';
     }
     echo '</tr>';

     $h = -$startMonth+2;
     for($j = 0; $j < 6 ; $j++)
     {
         echo '<tr height="140px" >';
         for($i = 0; $i < 7; $i++)
         {
                 if(($h > 0) && ($h <= $monthlenght))
                 {
                         echo '<td width="180px" valign="top" align="right">'.$h.'<br><p style="text-align:left;">';
                         if(isset($events[$h]))
                         {
                                 for($z = 0; $z < count($events[$h]);$z++)
                                 {
                                         echo $events[$h][$z]['start_time'].' <a href="content/event_details.php?event='.$events[$h][$z]['event_ID'].'" data-change="main">'.$events[$h][$z]['subject'].'</a><br>';
                                 }
                         }
                         echo '</p></td>';
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