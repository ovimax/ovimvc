<?php

class ViewerController
{	
	protected $header;
	protected $boody;
	protected $footer;

	function __construct($view = null)
	{
		if($view)
		{	
			$this->header = file_get_contents("view/core/header.html");
			$this->footer = file_get_contents('view/core/footer.html');
			$this->view = $view;
			self::launch_view();
		}
	}

	function launch_view()
	{
		if(self::view_exists())
		{
			return self::get_view();
		}
		else
		{
			die("ERROR 404: File not found");
		}
	}

	function view_exists()
	{
		if (file_exists('view/'.$this->view.'.html'))
		{
			return true;
		}

		return false;
	}

	function get_view()
	{
		$view = file_get_contents("view/core/template.html");

		$header = self::get_header();
		$footer = self::get_footer();

		$body = file_get_contents('view/'.$this->view.'.html');
		$body = str_replace("<< #mundo# >>","<h1>HOLA MUNDOS</h1>",$body);

		$view = str_replace("<< #header# >>",$header,$view);
		$view = str_replace("<< #body# >>",$body,$view);
		$view = str_replace("<< #footer# >>",$footer,$view);

		return $view;

	}

	function set_title_header($title = "")
	{	
		return $this->header = str_replace("<< #title# >>",$title, $this->header);
	}

	function get_header()
	{
		return $this->header;
	}

	function get_footer()
	{
		return $this->footer;
	}

}