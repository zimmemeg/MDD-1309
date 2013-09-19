<?php

require_once "db.php";
require_once "AuthModel.php";
require_once "AuthView.php";

$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';
$user = NULL;

session_start();

if(!empty($_SESSION['userInfo'])){
    $contentPage = 'success';
    $user = $_SESSION['userInfo'];
}

if(!empty($username) && !empty($password)){
    $user = $model->getUserByNamePass($username, $password);
    if(is_array($user)){
        $contentPage = 'success';
        $_SESSION['userInfo'] = $user;
    }
}

$view->show('header');
$view->show($contentPage, $user);
$view->show('footer');