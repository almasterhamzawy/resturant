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


$get = new restaurantCategory();

$categories = $get->getAllCategory();


include'../template/back/navbar.html';
include '../template/back/all-categories.html';
include'../template/back/footer.html';