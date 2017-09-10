<?php


//this function is using for checking login

function checkLogin(){
    return (isset($_SESSION['user']))?true : false;
}