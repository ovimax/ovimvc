<?php

//namespace Lanzador;

class Lanzador extends MainController
{	

	function __construct()
	{
		echo "ESTO MARCHA QUE NO VEAS";
	}
	public static function run()
	{
		echo "<h1>HOLA MUNDO</h1>";
	}

	public function viewer2()
	{
		return parent::viewer2();
	}

	function test()
	{
		echo get_class($this);
	}
}