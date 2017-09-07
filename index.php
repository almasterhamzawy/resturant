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



if(count($_POST)>0){

    $category = htmlentities($_POST['category']);
    $restaurant = htmlentities($_POST['restaurant']);
    $city = htmlentities($_POST['city']);
    $time = htmlentities($_POST['time']);


    print_r($_POST);

}





include'template/front/index.html';

