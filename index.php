<?php


include'includes/config.php';


$city = new restaurantcity();
$cities = $city->getAllCity();

//get all categories

$category = new restaurantCategory();
$categories = $category->getAllCategory();

//get all categories

$time = new restaurantTime();
$times = $time->getAllTimes();

////get all restaurants

$restaurant = new restaurantInfo();

$restaurants = $restaurant->selectAllRestaurants();

$category   = (isset($_GET['category']))? (int)$_GET['category']:0;
$city       = (isset($_GET['city']))? (int)$_GET['city']:0;
$time       = (isset($_GET['time']))? (int)$_GET['time']:0;

$results = $restaurant->getRestaurant($category,$city,$time);

print_r($results);

include'template/front/index.html';

