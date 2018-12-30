<?php

class Demo extends MainController
{
	public function __construct(){
		$this->__viewer();
	}

	function __viewer()
	{	
		return parent::viewer();
	}

	function database_demo()
	{
		$servername = "localhost";
		$user = "root";
		$pass = "root";
		$dbName = "test";

		// Create connectionj
		$con = new mysqli($servername,$user, $pass, $dbName);

		// Check connection
		if ($con->connect_error)
		{
			die('Conection failed: '. $con->connect_error);
		}		

		$sql = "SELECT * FROM demo";
		$result = $con->query($sql);

		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				var_dump($row);
			}
		}else
		{
			die("Table empty");
		}

		$con->close();
		die("Connection OK");
	}
}