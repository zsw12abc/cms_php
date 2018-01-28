<?php
/**
 * Created by PhpStorm.
 * User: shaowei
 * Date: 2018/1/26
 * Time: 下午8:31
 */
session_start();
$_SESSION['user_id'] = null;
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_image'] = null;
$_SESSION['user_role'] = null;
header('Location: ../index.php');