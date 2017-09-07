<?php

include '../includes/checkLogin.php';

session_start();

if (!checkLogin()) {

    header('LOCATION:login.php');
}

include'../template/back/navbar.html';
include'../template/back/index.htm';
include'../template/back/footer.html';