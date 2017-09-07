<?php

session_start(); //session for store user info when he suffering the site

//requiring files start

require'../includes/config.php'; // configuration information of database

require '../includes/classes/restaurantDis.php'; // restaurantCategory class

include '../includes/checkLogin.php'; // function to check if user login or not

//requiring files end


// function to check if user login or not

if(!checkLogin()){

    header('LOCATION:login.php');
}


$get = new restaurantDis();

$discounts = $get->getAllDiscounts();


include'../template/back/navbar.html';
include '../template/back/all-discounts.html';
include'../template/back/footer.html';