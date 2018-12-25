<?php

error_reporting(E_ALL|E_STRICT);

include "config/main.php";

function controller_loader($class)
{
	global $config;
	auto_loader($class,$config["controller_path"]);
}

function core_loader($class)
{
	global $config;
	auto_loader($class,$config["core_path"]);
}

function auto_loader($class, $path)
{
    $dir = __DIR__.$path;
    $directorio = opendir($dir);

    while ($archivo = readdir($directorio))
    {
        if($archivo !='.' && $archivo !='..' && $archivo!= '.git')
        {
            if(!is_dir($dir."/".$archivo)){
                $name = explode(".", $archivo);
                if($class == $name[0]){
                    include($dir."/".$archivo);
                }
            } 
        }
    }
}

spl_autoload_register("core_loader");
spl_autoload_register("controller_loader");

