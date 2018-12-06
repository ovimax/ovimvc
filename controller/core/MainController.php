<?php

require("ViewerController.php");
require("ModelController.php");


class MainController
{
	function __construct()
	{
		//$this->view = new ViewerController();
		//$this->model = new ModelController();
	}

	function viewer($template = null, $date = array())
	{
		$view = new ViewerController("demos");

		//$footer = $view->get_footer();

		/*$view = file_get_contents("view/core/template.html");
		$header = file_get_contents("view/core/header.html");
		$body = file_get_contents("view/demo.html");
		$body = str_replace("<< #mundo# >>","<h1>HOLA MUNDOS</h1>",$body);
		$view = str_replace("<< #header# >>",$header,$view);
		$view = str_replace("<< #body# >>",$body,$view);
		$view = str_replace("<< #footer# >>",$footer,$view);*/
		echo $view->launch_view();

	}
}