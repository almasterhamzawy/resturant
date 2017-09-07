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


    $category = filter_var($_POST['category'],FILTER_SANITIZE_STRING); //filtering category where it  coming from the form


    //  add error validate start
    $errorMessage = array();

    if(strlen($category) < 5){

        $userError = $errorMessage[] = 'category must be 2 characters or more';

    }elseif(empty($category)){
        $userError = $errorMessage[] = 'you must add category';
    }

    if(count($errorMessage)>0){


    }else{
        $categoryObject = new restaurantCategory(); // new object of restaurantCategory class

        $cate =  $categoryObject->addCategory($category);

        header("LOCATION:all-categories.php");
    }
}




include'../template/back/navbar.html';
include '../template/back/add-category.html';
include'../template/back/footer.html';