<?php
/**
  * Index File excutes the specific controller gived by que route file
  */ 
$request_uri = explode('/', $_SERVER['REQUEST_URI']);

$ruta = end($request_uri);

$rutas = require("routes.php");


if($ruta == "")
{
	echo "<h1>Pagina de inicio</h1><br> <a href='demo'>Ir a demo</a>";
}
else{

if(!isset($rutas[$ruta]))
{
	header("Location: /");
}
$controller = $rutas[$ruta];

$file = "controller/".$controller.".php";

require_once($file);

$d = new $controller();


echo $d->demo();

}

