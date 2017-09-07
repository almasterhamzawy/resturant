<?php

session_start(); //session for store user info when he suffering the site

//requiring files start

require'../includes/config.php'; // configuration information of database

require '../includes/classes/admin.php'; // admin class

include '../includes/checkLogin.php'; // function to check if user login or not

//requiring files end


$error = '';


// function to check if user login or not

if(checkLogin()){

    header('LOCATION:index.php');
}

//getting information from form to logging function

if(count($_POST)>0){


    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING); //filtering username where it  coming from the form

    $password = htmlentities($_POST['password']); //filtering password where it  coming from the form

    $adminObject = new admin(); // new object of admin class

    $admin =  $adminObject->login($username,$password); // login function

    if($admin && count($admin)>0){ //checking if there is any information back

        $_SESSION['user'] = $admin; //store into session

        header('LOCATION:index.php'); // moving to index page if it success

    }else{
        $error = 'check your username or password '; //print error if login not success

    }


}






include '../template/back/login.html';