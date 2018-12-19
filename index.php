<?php

error_reporting(E_ALL|E_STRICT);

include "config/main.php";

function auto_loader($class)
{
    global $config;
    $dir = __DIR__.$config["cotroller_path"];
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
//include("F:\MAMP\htdocs\ovimvc\controller/Lanzador.php");
spl_autoload_register("auto_loader");

$lanzador = new Lanzador();

echo $lanzador->hola();



