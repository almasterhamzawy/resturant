
<?php

class Manage {

    public static function autoload($class) {
        include 'classes/'. $class .'.class.php';
    }

}

spl_autoload_register(array('Manage', 'autoload'));