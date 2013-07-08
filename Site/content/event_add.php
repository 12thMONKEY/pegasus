<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");

     if($_POST)
     {
         echo $_POST['describtion'];
     }


         $date = $_GET['date'];
         $datearray = explode('.', $date);
         $this_day = $datearray[0];
         $this_month = $datearray[1];
         $this_year = $datearray[2];

         $result = mysql_query("         SELECT events.event_ID, start_time, subject, end_year, end_month, end_day, end_time
                                         FROM user , events , user_events_lookup
                                         WHERE user.user_ID = ".$_SESSION['user_ID']."
                                         AND user.user_ID = user_events_lookup.user_ID
                                         AND user_events_lookup.event_ID = events.event_ID
                                         AND events.start_month = ".$this_month."
                                         AND events.start_year = ".$this_year."
                                         AND events.start_day = ".$this_day."
                                         ORDER BY events.start_time ASC"
                                 );

         echo '<b>Bissherige Termine am '.$date.':</b><br><br>';

         while ($row2 = mysql_fetch_assoc($result)) {
                         $time = $row2['start_time'];
                         $timearray = explode(':', $time);
                         $start_time = date('H:i', mktime($timearray[0],$timearray[1],0,1,1,1970));
                         echo $start_time.' <a href="content/event_details.php?event='.$row2['event_ID'].'" data-change="main">'.$row2['subject'].'</a><br>';
         }

         echo '<br><br><b>Neuen Termin einf&uuml;gen:</b><br><br>';

         echo $date.'<br><br>';
         echo '<form action="event_add.php" method="post">';
         echo 'Betreff: <input type="text" name="subject">';
         echo 'Beschreibung: <br><textarea name="describtion"></textarea><br><br>';
         echo 'Ort: <br><textarea name="location"></textarea><br>';
         echo 'Beginnzeit: <br><input type="time"><br>';
         echo 'Endzeit: <br><input type="time"><br><br>';
         echo '<button type="submit">Erstellen</button>';
         echo '</form>';

?>