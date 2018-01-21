<?php
@session_start();
include_once 'config.php';
include_once 'functions.php';
include_once 'validator.php';

include_once "header.php";
if (isset($_GET['a'])) {
    $route = $_GET['a'];
    switch ($route) {
        case "login":
            include_once 'login.php';
            break;
        case "signup":
            include_once 'signup.php';
            break;
        case "404":
            include_once '404.php';
            break;
        case "403":
            include_once '403.php';
            break;
        case "home":
            include_once 'home.php';
            break;
        default:
            include_once 'home.php';
            break;
    }


    include_once 'footer.php';
}
else
   header("location: ?a=404");
