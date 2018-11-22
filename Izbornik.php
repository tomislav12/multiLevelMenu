<?php

class Izbornik {


	public function __construct($conn = NULL)
	{
		$this->connection = $conn;
	}

	private $connection;
	
	public static function getAll($conn)
	{
		
		$sql = "SELECT * FROM izbornik";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    $list = [];
		    while($row = $result->fetch_assoc()) 
		    {
			$list[] = $row;
		    }
		    return $list;
		} else {
		    return FALSE;
		}
	}

}

