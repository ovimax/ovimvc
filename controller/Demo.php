<?php

class Demo
{
	public function __construct(){}

	function demo()
	{	
		$view = file_get_contents("view/template.html");
		$header = file_get_contents("view/header.html");
		$footer = file_get_contents("view/footer.html");
		$body = file_get_contents("view/demo.html");
		$body = str_replace("<< #mundo# >>","<h1>HOLA MUNDOS</h1>",$body);
		$view = str_replace("<< #header# >>",$header,$view);
		$view = str_replace("<< #body# >>",$body,$view);
		$view = str_replace("<< #footer# >>",$footer,$view);
		return $view;
	}
}