<?php 
include('../config/config.php');
include("calendar.php");

//Create an array to store data that we will send back to the jQuery
$data = array(
    'success' => false, //Flag whether everything was successful
    'data' => array()
);

$dateComponents = getdate();
$monthName = $dateComponents['month'];			     
$dateArray = $dateComponents['mday'];
$currYear = $dateComponents['year'];

if (isset($_POST['date'])) {
	$date = $_POST['date'];

	$calenda = new Database($monthName, $currYear, $dateArray);
	$sql = "SELECT title, start_time, end_time, location, body FROM events WHERE date= '". $date ."'";
	$result = $calenda->select($sql);

	if(!empty($result)) {
		$data['data'] = $result[0];
		$data['success'] = true;
	} else {
		$data['success'] = false;
	}

} else if (isset($_POST['daily'])) {
	$date = $_POST['daily'];
	$dayOfWeek = $_POST['dayOfWeek'];

	$calenda = new Database($monthName, $currYear, $dateArray);
	$sql = "SELECT title, start_time, end_time, location, body FROM events WHERE date= '". $date ."'";
	$result = $calenda->select($sql);

	if(!empty($result)) {
		$data['data'] = $result;
	} 
	$data['success'] = true;
} else if (isset($_POST['update'])) {
	$input = $_POST['update'];
	$title = $input["title"];
	$start_time = $input["start_time"];
	$end_time = $input["end_time"];
	$location = $input["location"];
	$body = $input['body'];
	$date = $input['date'];

	$calenda = new Database($monthName, $currYear, $dateArray);
	$result = $calenda->update($input);
	if($result == false) {
		$data['success'] = false;
	} else {
		$data['success'] = true;
	}
	
} else if (isset($_POST['inputs'])) {
	$input = $_POST['inputs'];
	$title = $input["title"];
	$start_time = $input["start_time"];
	$end_time = $input["end_time"];
	$location = $input["location"];
	$body = $input['body'];
	$date = $input['date'];

	$calenda = new Database($monthName, $currYear, $dateArray);
	$sql = "INSERT INTO events (title, start_time, end_time, location, date, body, created) VALUES (" . "'".implode("','", $input)."'" . ", '" . date('Y-m-d'). "'" .");";
	$result = $calenda->insert($sql);

	$data['success'] = true;

} else {
	$data['errors'][] = "Data missing";
}

header("Content-Type: application/json; charset=UTF-8");
echo json_encode((object)$data);

?>