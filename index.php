<?php


include'includes/config.php';

include'includes/classes/restaurantInfo.php';


$get = new restaurantInfo();

echo'<pre>';
print_r($get->selectCity('cairo'));

