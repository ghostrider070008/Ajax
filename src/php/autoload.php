<?php
// фукнция автозагрузка
function autoload($class_name){
    require_once "".$class_name.".php";
}
function autoloadMigration($class_name){
    require_once "migration/".$class_name.".php";
}

spl_autoload_register('autoload');
spl_autoload_register('autoloadMigration');



/*




spl_autoload_register(function($class)
{
    if (file_exists("lib/" . $class . "php")) {
        require_once "lib/".$class.".php";

    }
    else{
        if (file_exists("lib/migration/" . $class . "php")) {
            require_once "lib/migration" . $class . ".php";
        }
    }
});*/



/*namespace lib;


spl_autoload_register( function($classname){
/*include($classname .".php");*/
 /*   $file = $classname . ".php";
    echo $file.PHP_EOL;
    if (is_readable($file)) {
        echo $file;
        require($classname . ".php");
    }*/

/*//return print_r($classname);
} );*/


