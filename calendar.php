<header>
	<link rel="stylesheet" type="text/css" href="css/calendarstyles.css">
</header>


<!-- This code is required before the form if it posts to itself and if there is no data set to current month -->
<?php
require 'includes/dbh.inc.php';

if(isset($_POST['submit'])){
    $year_select = $_POST['year_select'];
	$month_select = $_POST['month_select'];
 // for debug  echo "User Has submitted the form so the calendar for <b> $month_select/$year_select </b> is displayed below:";
}
else if(!isset($_POST['submit']) && !isset($_GET['month'])){
	//$timezone = (date_default_timezone_set("Europe/London"));
	$year_select = date('Y');
	$month_select = date('m');

	//echo"elseif: year_select:" . $year_select;
	//echo"elseif: month_select:" . $month_select;
}else{
	//$timezone = (date_default_timezone_set("Europe/London"));
	$year_select = $_GET['year'];
	$month_select = $_GET['month'];

	//echo"else: year_select:" . $year_select; //debug
	//echo"else: month_select:" . $month_select; //debug
}

$resID =  $_GET['rid'];


?>

<form method="post" action=" <?php echo $_SERVER['PHP_SELF'] . '?rid='.$resID; ?> "> <!--action parameter -->
	<fieldset><h2>Booking Schedule</h2>
		<ol class="date_select">
			<li>
				<select id="month" name="month_select" >
					<option value="<?php echo date('m');?>">please select month</option>
					<option value="0">January</option>
				    <option value="1">February</option>
				    <option value="2">March</option>
				    <option value="3">April</option>
				    <option value="4">May</option>
				    <option value="5">June</option>
				    <option value="6">July</option>
				    <option value="7">August</option>
				    <option value="8">September</option>
				    <option value="9">October</option>
				    <option value="10">November</option>
				    <option value="11">December</option>
				</select>
			</li>
			<li>
				<select id="year" name="year_select">
					<option value="<?php echo date('Y'); ?>">please select year</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
				</select>
			</li>
								<li>
								<input type="submit" name="submit" value="Enter">
								</li>

		</ol>
	</fieldset>
	</form>
<?php




/* draws a calendar */
function draw_calendar($month,$year,$events = array()){
  /* draw table */
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
  /* table headings */
  $headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	$month = ((int) $month) + 1  ;
		if ($month < 10) {
		$month = "0" . ((string) $month);
		}else{
			$month = (string) $month;
		}

  /* days and weeks vars now ... */
  //$timezone = (date_default_timezone_set("Europe/London"));
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();
  /* row for week one */
  $calendar.= '<tr class="calendar-row">';
  /* print "blank" days until the first of the current week */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    $days_in_this_week++;
  endfor;
	//$events = array();



  /* keep going with days.... */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* add in the day number */
      $calendar.= '<div class="day-number">'.$list_day.'</div>';
      /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! 	echo $year; echo $month;**/
		/* Database query to get events from DB */

		//die((string)$month);
		//die((string)$m);

		//die($month);
		$day = '';
		if ($list_day < 10) {
		$day = "0" . ((string) $list_day);
		}else{
			$day = (string) $list_day;
		}
		$event_day = $year.'-'.$month.'-'.$day;
		//die($event_day);
		if ($list_day == 24)
		{
			//die($events[$event_day]);
		}

		      //if(isset($events[$event_day])) {

		    foreach($events as $event) {
				//echo '|| event_day='.$event_day;
				//echo ' start_day='.$event['StartDate'];
				if(($event['StartDate'] == $event_day || $event['EndDate'] == $event_day) || ($event['StartDate'] < $event_day && $event['EndDate'] > $event_day)){
					$calendar.= '<div class="event" ><p>Reserved</p></div>';
				//	echo ' event_day='.$event_day;
				} //else {
					//$calendar.= '<div class="eventavail"><p>Available</p></div>';
		        //}
			}
		      //}
		      //else {


      //$calendar.= str_repeat('<p>&nbsp;</p>',2);
   //}
    $calendar.= '</td>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;
  /* finish the rest of the days in the week */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    endfor;
  endif;
  /* final row */
  $calendar.= '</tr>';
  /* end the table */
  $calendar.= '</table>';

  /* all done, return result */
  return $calendar;
}


/* array so we can display the actual month instead of the integer value from the drop down */
$actual_month = array ('January','February','March','April','May','June','July','August','September','October','November','December');
//get the previous month function
//$previous_month = $month_select - 1;
//$next_month = $month_select + 1;

$previous_month_link = '<a href="?rid='.$resID.'&month='.($month_select != 0 ? $month_select - 1 : 11).'&year='.($month_select != 0 ? $year_select : $year_select - 1).'" class="control"><<   Previous Month</a>';
$next_month_link = '<a href="?rid='.$resID.'&month='.($month_select != 11 ? $month_select + 1 : 0).'&year='.($month_select != 11 ? $year_select : $year_select + 1).'" class="control">Next Month   >></a>';



/* draw calendar navigation */

echo "<h3>". $actual_month[$month_select] ." ". $year_select."</h3>".
		 $previous_month_link. ' || '.
		 $next_month_link;




$month = '';
if ($month_select < 9) {
$month = "0" . ((string) $month_select+1);
}else{
	$month = ((string) $month_select+1);
}

//print $month;
$query = "SELECT *, DATE_FORMAT(StartDate,'%Y-%m-%d') AS StartDate,
 										DATE_FORMAT(EndDate,'%Y-%m-%d') AS EndDate
										FROM reservation WHERE
										ResidenceID = '$resID' AND
										StartDate LIKE '$year_select-$month%' OR
										EndDate LIKE '$year_select-$month%'";


$result = mysqli_query($conn,$query) or die('cannot get results!');
//die(print_r(mysql_fetch_assoc($result)));
$events = array();
$count = 0;
while($row = mysqli_fetch_assoc($result)) {
	//print $row['ResidenceID']. " ";
	//print $row['StartDate'] .",". $row['EndDate'] ."|";
	//die($row['StartDate']);
  //$events[$row['StartDate']][] = $row;
$events[$count] = $row;
$count++;
}



//die((string)$events[0]['post_title']);
echo draw_calendar($month_select,$year_select, $events);
//print_r($events);
/* debug list 

echo 'before##############';
echo $_SERVER['PHP_SELF'] . '?rid='.$resID;
echo '?rid='.$resID;
echo ' currentmonth_select='.$month_select;
echo ' currentyear_select='.$year_select;

echo 'after#########';
echo $_SERVER['PHP_SELF'] . '?rid='.$resID;
echo '?rid='.$resID;
echo ' currentmonth_select='.$month_select;
echo ' currentyear_select='.$year_select;
*/
?>
