<?php

spl_autoload_register( function($classname){
include("lib/".$classname .".php");
return print_r($classname);
} );