<?php


//this is the configuration for the database



define('HOST','127.0.0.1'); //HOST NAME

define('USER','admin'); //  DATABASE USERNAME

define('PASSWORD',''); //PASSWORD FOR DATABASE

define('DB','restaurant'); //DATABASE NAME



spl_autoload_register(function($class) {
    include 'classes/'. $class .'.class.php';
});
