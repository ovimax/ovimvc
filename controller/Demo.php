<?php

class Demo extends MainController
{
	public function __construct(){}

	function demo()
	{	
		$view = file_get_contents("view/core/template.html");
		$header = file_get_contents("view/core/header.html");
		$footer = file_get_contents('view/core/footer.html');
		$body = file_get_contents("view/demo.html");
		$body = str_replace("<< #mundo# >>","<h1>HOLA MUNDOS</h1>",$body);
		$view = str_replace("<< #header# >>",$header,$view);
		$view = str_replace("<< #body# >>",$body,$view);
		$view = str_replace("<< #footer# >>",$footer,$view);
		return $view;
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