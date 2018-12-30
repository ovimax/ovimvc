<?php

include "routes.php";
launcher();

/**
 * Returns the last URL parametes without the GET values, that will be our route value
 * @return [string]
 */
function request_uri()
{
	$request_uri = explode('/', $_SERVER['REQUEST_URI']);
	$request_uri = explode('?',end($request_uri));
	return $request_uri[0];
}

/**
 * We don't want null values, onles it's need it, so for the route we define as defaut route the request_uri
 * @param  [string] $route 
 * @return [string] 
 */
function route_not_null($route = null)
{
	if(!$route){$route = request_uri();}

	return $route;
}

/**
 * Check if a given route or the request uri, exists as a route in the routes file
 * @param  [string] $route
 * @return [bool]      
 */
function route_exists($route = null)
{
	global $routes;
	route_not_null($route);

	if(isset($routes[$route]) && $routes[$route]!="")
	{
		return true;
	}

	return false;
}


/**
 * Returns the controller of a given route
 * @param  [string] $route
 * @return [string]        [description]
 */
function get_route_controller($route = null)
{
	global $routes;
	$route = route_not_null($route);

	if(route_exists($route))
	{
		$controller = $routes[$route];
		new $controller();
	}
	else
	{
		throw new Exception("Controller does not exists");	
	}
}

function launcher()
{
	try {
		get_route_controller();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
		
}
