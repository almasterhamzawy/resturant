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


//get all restaurant information

$restaurant = new restaurantInfo();

$restaurants = $restaurant->selectAllRestaurants();

//get restaurant information when user enter category city and time

$category   = (isset($_GET['category']))? (int)$_GET['category']:0;
$city       = (isset($_GET['city']))? (int)$_GET['city']:0;
$time       = (isset($_GET['time']))? (int)$_GET['time']:0;


$newRestaurant = new restaurantInfo();
$newResults = $newRestaurant->getRestaurant($category,$city,$time);




include'template/front/index.html';

