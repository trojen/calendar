<?php
include("database.php");

/**
* Calenda class
*/
class Calendar extends Database
{
     var $month;
     var $year;
     var $dateArray;

     function __construct($mth, $yr, $dateArr)
     {
          parent::__construct();
          $this->month = $mth;
          $this->year = $yr;
          $this->dateArray = $dateArr;
     }
     function build_calendar($month,$year,$monthFullName) {
          // Create array containing abbreviations of days of week.
          $daysOfWeek = array('S','M','T','W','T','F','S');

          // What is the first day of the month in question?
          $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

          // How many days does this month contain?
          $numberDays = date('t',$firstDayOfMonth);

          // Retrieve some information about the first day of the
          // month in question.
          $dateComponents = getdate($firstDayOfMonth);
          // What is the name of the month in question?
          $monthName = $dateComponents['month'];
          $currentMon = "";
          if($monthName == $monthFullName) {

               $currentMon = $monthName;
          }
          // What is the index value (0-6) of the first day of the
          // month in question.
          $dayOfWeek = $dateComponents['wday'];
          // Create the table tag opener and day headers
          $calendar = "<div class=\"calendar_div\"><table class='calendar table-bordered'>";
          $calendar .= "<caption><a href='?calendarMonth=".$year. "-" .$month."&month=$monthFullName' class=\"month_year\">$monthName $year</a></caption>";
          $calendar .= "<tr>";

          // Create the calendar headers
          foreach($daysOfWeek as $day) {
               $calendar .= "<th class='header'>$day</th>";
          } 

          // Create the rest of the calendar

          // Initiate the day counter, starting with the 1st.
          $currentDay = 1;
          $calendar .= "</tr><tr>";
          // The variable $dayOfWeek is used to
          // ensure that the calendar
          // display consists of exactly 7 columns.
          while ( $currentDay <= $dayOfWeek) {
               # code...
               $calendar .= "<td>&nbsp;</td>";
               $currentDay++;
          }
          
          $currentDay = 1;

          $month = str_pad($month, 2, "0", STR_PAD_LEFT);
       
          while ($currentDay <= $numberDays) {
               // Seventh column (Saturday) reached. Start a new row.
               if ($dayOfWeek == 7) {
                    $dayOfWeek = 0;
                    $calendar .= "</tr><tr>";
               }

               $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);         
               $date = "$year-$month-$currentDayRel";
               $query = $this->getEventQuery($date);

               if(!empty($query)) {
                    $id = $query[0]['id'];
                    if($this->dateArray == $currentDay && $currentMon == $monthFullName && $year == $this->year) {
                         $calendar .= "<td id=\"$id\" class='day current event' rel='$date'>$currentDay</td>";
                    } else {
                         $calendar .= "<td class='day event' rel='$date'>$currentDay</td>";
                    }
               } else {
                    if($this->dateArray == $currentDay && $currentMon == $monthFullName && $year == $this->year) {
                         $calendar .= "<td class='day current' rel='$date'>$currentDay</td>";
                    } else {
                         $calendar .= "<td class='day' rel='$date'>$currentDay</td>";
                    }
               }
               // Increment counters
               $currentDay++;
               $dayOfWeek++;
          }
          // Complete the row of the last week in month, if necessary
          if ($dayOfWeek != 7) {      
               $remainingDays = 7 - $dayOfWeek;
               while ($remainingDays != 0) {
                    $calendar .= "<td>&nbsp;</td>"; 
                    $remainingDays--;
               }
          }    
          $calendar .= "</tr>";
          $calendar .= "</table></div>";

          return $calendar;
     }
     function detail_calendar($month,$year,$monthFullName) {
          // Create array containing abbreviations of days of week.
          $daysOfWeek = array('S','M','T','W','T','F','S');

          // What is the first day of the month in question?
          $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

          // How many days does this month contain?
          $numberDays = date('t',$firstDayOfMonth);

          // Retrieve some information about the first day of the
          // month in question.
          $dateComponents = getdate($firstDayOfMonth);
          // What is the name of the month in question?
          $monthArray = array('January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December');
          
          $monthName = $dateComponents['month'];
          $currentMon = "";
          if($monthName == $monthFullName) {

               $currentMon = $monthName;
          }

          if($month == 12) {
               $next_year = $year + 1;
               $next_month = 1;
               $last_month = $month - 1;
               $last_year = $year;
               $next_monthName = $monthArray[$next_month-1];
               $last_monthName = $monthArray[$last_month-1];
          } else if ($month == 1) {
               $next_year = $year;
               $next_month = $month + 1;
               $last_month = 12;
               $last_year = $year - 1;
               $next_monthName = $monthArray[$next_month-1];
               $last_monthName = $monthArray[$last_month-1];
          } else {
               $next_month = $month + 1;
               $last_month = $month - 1;
               $last_year = $year;
               $next_year = $year;
               $next_monthName = $monthArray[$next_month-1];
               $last_monthName = $monthArray[$last_month-1];
          }
          

          // What is the index value (0-6) of the first day of the
          // month in question.
          $dayOfWeek = $dateComponents['wday'];
          // Create the table tag opener and day headers
          $calendar = "<div class=\"calendar_div\"><table class='calendar table-bordered'>";
          $calendar .= "<caption><a href='?calendarMonth=".$year. "-" .$month."&month=$monthFullName' class=\"month_year\">$monthName $year</a></caption>";
          $calendar .="<ul class=\"pager\"><li class=\"previous\"><a href='?calendarMonth=".$last_year. "-" .$last_month."&month=$last_monthName'>&laquo;</a></li><li class=\"next\"><a href='?calendarMonth=".$next_year. "-" .$next_month."&month=$next_monthName'>&raquo;</a></li></ul>";
          $calendar .= "<tr>";

          // Create the calendar headers
          foreach($daysOfWeek as $day) {
               $calendar .= "<th class='header'>$day</th>";
          } 

          // Create the rest of the calendar

          // Initiate the day counter, starting with the 1st.
          $currentDay = 1;
          $calendar .= "</tr><tr>";
          // The variable $dayOfWeek is used to
          // ensure that the calendar
          // display consists of exactly 7 columns.
          while ( $currentDay <= $dayOfWeek) {
               # code...
               $calendar .= "<td>&nbsp;</td>";
               $currentDay++;
          }
          
          $currentDay = 1;

          $month = str_pad($month, 2, "0", STR_PAD_LEFT);
       
          while ($currentDay <= $numberDays) {
               // Seventh column (Saturday) reached. Start a new row.
               if ($dayOfWeek == 7) {
                    $dayOfWeek = 0;
                    $calendar .= "</tr><tr>";
               }

               $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);         
               $date = "$year-$month-$currentDayRel";
               $query = $this->getEventQuery($date);
               $dayOfWeekName= date("l", strtotime($date) );
               if(!empty($query)) {
                    $id = $query[0]['id'];
                    if($this->dateArray == $currentDay && $currentMon == $monthFullName && $year == $this->year) {
                         $calendar .= "<td id=\"$id\" class='daily current event' rel='$date' day-of-week= '$dayOfWeekName'>$currentDay</td>";
                    } else {
                         $calendar .= "<td class='daily event' rel='$date' day-of-week= '$dayOfWeekName'>$currentDay</td>";
                    }
               } else {
                    if($this->dateArray == $currentDay && $currentMon == $monthFullName && $year == $this->year) {
                         $calendar .= "<td class='daily current' rel='$date' day-of-week= '$dayOfWeekName'>$currentDay</td>";
                    } else {
                         $calendar .= "<td class='daily' rel='$date' day-of-week= '$dayOfWeekName'>$currentDay</td>";
                    }
               }
               // Increment counters
               $currentDay++;
               $dayOfWeek++;
          }
          // Complete the row of the last week in month, if necessary
          if ($dayOfWeek != 7) {      
               $remainingDays = 7 - $dayOfWeek;
               while ($remainingDays != 0) {
                    $calendar .= "<td>&nbsp;</td>"; 
                    $remainingDays--;
               }
          }    
          $calendar .= "</tr>";
          $calendar .= "</table></div>";

          return $calendar;
     }
     function daily_calendar($date)
     {
          $calendar = "<div class=\"calendar_div\"><table class='calendar table-bordered'>";
          $calendar .= "<caption>$monthName $year</caption>";
          $calendar .= "<tr>";
          $calendar .= "</tr>";
          $calendar .= "</table></div>";

          return $calendar;
     }
     function getEventQuery($date) {
          $select = "SELECT * FROM events WHERE date = '$date'";
          $result = $this->query($select);
          return $result;
     }
}

// header("Content-Type: application/json; charset=UTF-8");
// echo json_encode((object)$data);
?>