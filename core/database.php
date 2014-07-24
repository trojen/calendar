<?php

class Database
{
	protected $connection;
	protected $_fetchMode = 'assoc';

	function __construct()
	{   
		$this->connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME) or die("MySQL Error: " . mysqli_connect_errno());
	}

	function escapeString($string)
	{
		return mysqli_real_escape_string($string);
	}

	function query($qry)
	{    
		// writeLog("SQL:$qry");
		$result = mysqli_query($this->connection,$qry) or die("MySQL Error: $qry" . mysqli_connect_errno());
		$resultObjects = array();
		while($row=mysqli_fetch_array($result))
		{
		  if(!empty($row))
		  {
		    $resultObjects[] = $row;
		  }
		}
		return $resultObjects;
	}

	function update($array) {
		$update = array();
		foreach ($array as $key => $val) {
			if (!empty($val) && $key != "date") {
				$val = str_replace("'", "\'", $val);
				$update[$key] = $key. "='" .$val."'";
			}else if($key == "date") {
				$date = $val;
			}
		}
		// pd($update);
		$sql = "UPDATE events SET ". implode(", ", $update) .", modified='". date('Y-m-d')."' WHERE date='".$date."'";

		$result = mysqli_query($this->connection,$sql) or die("MySQL Error: $sql" . mysqli_connect_errno());
		
		return $result;
	}

	function select($qry)
	{    
		// writeLog("SQL:$qry");
		$result = mysqli_query($this->connection,$qry) or die("MySQL Error: $qry" . mysqli_connect_errno());
		$resultObjects = array();
		while($row=mysqli_fetch_assoc($result))
		{
		  if(!empty($row))
		  {
		    $resultObjects[] = $row;
		  }
		}
		return $resultObjects;
	}

	function insert($qry) {
		$result = mysqli_query($this->connection,$qry) or die("MySQL Error: $qry" . mysqli_connect_errno());
		return $result;
	}

	function execute($qry)
	{
		$status=0;
		// writeLog("SQL:$qry");
		$result = mysqli_query($this->connection,$qry);//die("MySQL Error: $qry" . mysql_error());
		return $result;
	}

	function closeConnect()
	{
		mysqli_close($this->connection);
	}
}

?>