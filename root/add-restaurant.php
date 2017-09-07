<?php

session_start(); //session for store user info when he suffering the site

//requiring files start

require'../includes/config.php'; // configuration information of database

include '../includes/checkLogin.php'; // function to check if user login or not

//requiring files end


$error = '';


// function to check if user login or not

if(!checkLogin()){

    header('LOCATION:login.php');
}

//getting information from form to logging function

if(count($_POST)>0){


    $name = filter_var($_POST['r-name'],FILTER_SANITIZE_STRING); //filtering restaurant where it  coming from the form
    $city = htmlentities($_POST['r-city']); //filtering restaurant where it  coming from the form
    $description = filter_var($_POST['r-des'],FILTER_SANITIZE_STRING); //filtering restaurant where it  coming from the form
    $category = htmlentities($_POST['r-category']); //filtering restaurant where it  coming from the form
    $time = htmlentities($_POST['r-time']);

    //  add error validate start
    $errorMessage = array();

    if(strlen($name) < 2){

        $userError = $errorMessage[] = 'restaurant must be 2 characters or more';

    }elseif(empty($name)){
        $userError = $errorMessage[] = 'you must add restaurant';
    }

    if(count($errorMessage)>0){

        echo 'error';

    }else{

        $restaurantObject = new restaurantInfo(); // new object of restaurant class

        $cate =  $restaurantObject->addRestaurant($name,$city,$description,$category,$time);

        header("LOCATION:all-restaurants.php");

    }
}



//get all cities

$city = new restaurantcity();
$cities = $city->getAllCity();

//get all categories

$category = new restaurantCategory();
$categories = $category->getAllCategory();

//get all categories

$time = new restaurantTime();
$times = $time->getAllTimes();


include'../template/back/navbar.html';
include '../template/back/add-restuarant.html';
include'../template/back/footer.html';