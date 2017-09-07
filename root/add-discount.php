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


    $discount = filter_var($_POST['discount'],FILTER_SANITIZE_STRING); //filtering discount where it  coming from the form
    $discountValue = filter_var($_POST['discountvalue'],FILTER_SANITIZE_NUMBER_FLOAT); //filtering discount where it  coming from the form
    $restaurantName = htmlentities($_POST['res-name']);

    //  add error validate start
    $errorMessage = array();

    if(strlen($discount) < 1){

        $userError = $errorMessage[] = 'discount card must be 1 character or more';

    }elseif(empty($discount)){
        $discountError = $errorMessage[] = 'you must add discount';
    }


    if(empty($discountValue)){
        $discountError = $errorMessage[] = 'you must add discount value';
    }

    if(count($errorMessage)>0){
        echo 'error';

    }else{
        $categoryObject = new restaurantDis(); // new object of discount class

        $cate =  $categoryObject->addDiscount($discount,$discountValue,$restaurantName);

        header("LOCATION:all-discounts.php");
    }
}


$restaurant = new restaurantInfo();

$restaurants =$restaurant->selectAllRestaurants();


include'../template/back/navbar.html';
include '../template/back/add-discount.html';
include'../template/back/footer.html';