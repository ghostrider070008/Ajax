<?php

spl_autoload_register( function($classname){
include($classname .".php");
return print_r($classname);
} );