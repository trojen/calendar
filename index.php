<?php
	include_once 'config/config.php';
	include 'core/calendar.php';
	require 'files/dialog.php';

	$dateComponents = getdate();
	$monthName = $dateComponents['month'];			     
	$dateArray = $dateComponents['mday'];
	$currYear = $dateComponents['year'];
	//For all Months in Specific Year
	$calenda = new Calendar($monthName, $currYear, $dateArray);
	
	if(isset($_POST['year'])) {
		$year = $_POST['year'];
		$minMon = $_POST['minMon'];
		$maxMon = $_POST['maxMon'];
	}
	$i = 1;
	$month=1; //Numeric Value
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Calendar System</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/JSON.js"></script>
</head>
<body>
	<div id="container">
		<div class="content">
			<div class="table-responsive">
				<form name="input" action="index.php" method="post">
					<table class="table">
						<tr>
							<td><label>Year: </label></td>
							<td><select class="form-control" name="year">
								<option>2010</option>
								<option>2011</option>
								<option>2012</option>
								<option>2013</option>
							</select></td>
						</tr>
						<tr>
							<td><label>Months: </label></td>
							<td><select class="form-control" name="minMon">
								<option value="1">jan</option>
								<option value="2">feb</option>
								<option value="3">mar</option>
								<option value="4">apr</option>
								<option value="5">may</option>
								<option value="6">jun</option>
								<option value="7">jul</option>
								<option value="8">aug</option>
								<option value="9">sep</option>
								<option value="10">oct</option>
								<option value="11">nov</option>
								<option value="12">dev</option>
							</select>
							<select class="form-control" name="maxMon">
								<option value="1">jan</option>
								<option value="2">feb</option>
								<option value="3">mar</option>
								<option value="4">apr</option>
								<option value="5">may</option>
								<option value="6">jun</option>
								<option value="7">jul</option>
								<option value="8">aug</option>
								<option value="9">sep</option>
								<option value="10">oct</option>
								<option value="11">nov</option>
								<option value="11">dev</option>
								<option value="12" selected>dev</option>
							</select></td>
						</tr>
						<tr>
							<td colspan="2"><input  class="btn btn-primary" type="submit" name="submit" value="enter"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="main">
			<?php if(isset($_GET['calendarMonth'])): ?>
				<?php 					
					$tmp = explode("-", $_GET['calendarMonth']);
					$monthNam = $_GET['month'];
					echo $calenda->detail_calendar($tmp[1],$tmp[0],$monthNam);
				?>
			<?php else: ?>
			<h2>Calendar System</h2>
			<?php
				if(isset($year)) {
					while($minMon <= $maxMon) {
						echo $calenda->build_calendar($minMon,$year,$monthName);
						$month=$month+1;
						$i++;
						$minMon++;
					}
				}
			?>
			<?php endif ?>
		</div>
		<footer>
			<p>Calendar System</p>
		</footer>
	</div>
</body>
</html>