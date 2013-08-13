<?php
     if(!defined('__ROOT__'))
     {
          define('__ROOT__', dirname(dirname(__FILE__)));
     }
     require_once(__ROOT__ ."/utils/functions.php");

     if(isset($_POST['subject']))
     {
     	 $s_time = date('H:i:s', mktime($_POST['s_hour'],$_POST['s_minute'],0,1,1,2000));
		 $e_time = date('H:i:s', mktime($_POST['e_hour'],$_POST['e_minute'],0,1,1,2000));
		 		 		  
		 $add_event_result = insert_db("pegasus.events", 
		 				"event_ID, subject, describtion, owner_ID, location, start_year, start_month, start_day, start_time, end_year, end_month, end_day, end_time",	 				
						"'NULL' , '".$_POST['subject']."', '".$_POST['describtion']."', '".$_SESSION['user_ID']."', '".$_POST['location']."', '".$_POST['s_year'].
						"', '".$_POST['s_month']."', '".$_POST['s_day']."', '$s_time', '".
						$_POST['e_year']."', '".$_POST['e_month']."', '".$_POST['e_day']."', '$e_time'"	 
		 );
		 
		 $add_user_event_lookup_result = insert_db("pegasus.user_events_lookup", "user_ID, event_ID, attendance_state", "'".$_SESSION['user_ID']."', LAST_INSERT_ID(), '0'");
		 
		 if($add_event_result && $add_user_event_lookup_result)
		 {
		 	echo 'Einf&uuml;gen erfolgreich!';
		 }
		 else
		 {
		 	echo 'An Error occured, try again.';
		 }
     }
	 else if(isset($_GET['date']))
	 {

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

         echo "$date<br><br>";
?>    
         <form id="add_event_form" action="content/event_add.php" method="post">
         Betreff: <br><input type="text" name="subject" id="add_event_subject"><br><br>
         Beschreibung: <br><textarea name="describtion" id="add_event_describtion"></textarea><br><br>
         Ort: <br><textarea name="location" id="add_event_location"></textarea><br>
         Beginn: <br>		<input type="text" name="s_day" id="add_event_start_day" maxlength="2" value="<?=$this_day?>" size="2">.
         					<input type="text" name="s_month" id="add_event_start_month" maxlength="2" value="<?=$this_month?>" size="2">.
         					<input type="text" name="s_year" id="add_event_start_year" maxlength="4" value="<?=$this_year?>" size="4">&nbsp;&nbsp;         
          					<input type="text" name="s_hour" id="add_event_start_hour" maxlength="2" placeholder="hh" size="2">:
         					<input type="text" name="s_minute" id="add_event_start_minute" maxlength="2" placeholder="mm" size="2"><br>
         					
         Ende: <br>			<input type="text" name="e_day" id="add_event_end_day" maxlength="2" value="<?=$this_day?>" size="2">.
         					<input type="text" name="e_month" id="add_event_end_month" maxlength="2" value="<?=$this_month?>" size="2">.
         					<input type="text" name="e_year" id="add_event_end_year" maxlength="4" value="<?=$this_year?>" size="4">&nbsp;&nbsp;
         					<input type="text" name="e_hour" id="add_event_end_hour" maxlength="2" placeholder="hh" size="2">:
         					<input type="text" name="e_minute" id="add_event_end_minute" maxlength="2" placeholder="mm" size="2"><br><br>
         					
		 <button type="submit">Erstellen</button>
         </form>
<?php
    }
?>