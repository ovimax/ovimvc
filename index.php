<?php

/**
  * Index File excutes the specific controller gived by que route file
  */ 
require("launcher.php");
$request_uri = explode('/', $_SERVER['REQUEST_URI']);

$ruta = end($request_uri);

$rutas = require("routes.php");



if($ruta == "")
{
	$view = file_get_contents("view/incio.html");
	$view = str_replace("<< #qui# >>", "Esto esta aqui", $view);
	echo $view;
}
else{

if(!isset($rutas[$ruta]))
{
	//header("Location: /");
}
$controller = $rutas[$ruta];

$file = "controller/".$controller.".php";

require_once($file);

$d = new $controller();
$d->__viewer();

}

