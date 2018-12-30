<?php

class MainController
{
	function __construct()
	{
		//$this->view = new ViewerController();
		//$this->model = new ModelController();
	}

	function viewer($template = null, $date = array())
	{
		$view = new ViewerController("demo");
		$view->set_title_header("Hi pixa");
		echo $view->launch_view();

	}
}