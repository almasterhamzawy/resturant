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


    $city = filter_var($_POST['city'],FILTER_SANITIZE_STRING); //filtering city where it  coming from the form


    //  add error validate start
    $errorMessage = array();

    if(strlen($city) < 3){

        $userError = $errorMessage[] = 'city must be 3 characters or more';

    }elseif(empty($city)){
        $userError = $errorMessage[] = 'you must add city';
    }

    if(count($errorMessage)>0){


    }else{
        $cityObject = new restaurantcity(); // new object of restaurantcity class

        $cate =  $cityObject->addcity($city);

        header("LOCATION:add-city.php");
    }
}




include'../template/back/navbar.html';
include '../template/back/add-city.html';
include'../template/back/footer.html';