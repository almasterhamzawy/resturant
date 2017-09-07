<?php


include'includes/config.php';

include 'includes/classes/restaurantInfo.class.php';


$get = new restaurantInfo();

echo'<pre>';
print_r($get->selectCity('cairo'));

