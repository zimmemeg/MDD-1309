<?php

//Adding the required fields to make the page run.
require_once "db.php";
require_once "../Models/AuthModel.php";
require_once "../Views/AuthView.php";

//Creating a new authentication model and authentication view for the user.
$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new AuthView();

//Defining the variables for username and password, trim the white space and lowercase the username
$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

//Defining the content page as the login form, setting the default user to NULL
$contentPage = 'form';
$user = NULL;

//starting the session
session_start();

//If the session is empty, take the userinfo and show the success page
//instead of the log in, log the userinfo in the sesion
if(!empty($_SESSION['userInfo'])){
    $contentPage = 'success';
    $user = $_SESSION['userInfo'];
}

//If the username and password are not empty, define the user variable as the user
//that matches the username and password, show the success page instead of the login,
//and log the userinfo for the session in the user variable.
if(!empty($username) && !empty($password)){
    $user = $model->getUserByNamePass($username, $password);
    if(is_array($user)){
        $contentPage = 'success';
        $_SESSION['userInfo'] = $user;
    }
}

//Showing the header, footer, and depending if somebody is logged in or not, the
//search page or the login page.
$view->show('header');
$view->show($contentPage, $user);
$view->show('footer');