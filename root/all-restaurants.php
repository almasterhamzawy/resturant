<?php

session_start(); //session for store user info when he suffering the site

//requiring files start

require'../includes/config.php'; // configuration information of database

include '../includes/checkLogin.php'; // function to check if user login or not

//requiring files end


// function to check if user login or not

if(!checkLogin()){

    header('LOCATION:login.php');
}



$get = new restaurantInfo();

$restaurants = $get->selectAllRestaurants();


include'../template/back/navbar.html';
include '../template/back/all-restaurants.html';
include'../template/back/footer.html';