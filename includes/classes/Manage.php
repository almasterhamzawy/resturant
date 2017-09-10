
<?php

//the class is for share the class in project

class Manage {

    public static function autoload($class) {
        include 'classes/'. $class .'.class.php';
    }

}

spl_autoload_register(array('Manage', 'autoload'));