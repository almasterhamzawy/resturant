<?php


session_start();  //session for store user info when he suffering the site

session_destroy(); //session for delete user info when he ending suffering the site

header('LOCATION:login.php'); //move to login page 