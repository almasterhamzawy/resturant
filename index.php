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



include'template/front/index.html';

