<?php
/**
 * Created by PhpStorm.
 * User: shaowei
 * Date: 2018/1/24
 * Time: 下午1:32
 */

//PDO way => suit to different kinds of databse
ini_set('display_errors', 'On');

$database['dsn'] = 'mysql:host=localhost:8889;dbname=cms';
$database['username'] = 'root';
$database['password'] = 'root';

foreach ($database as $key => $value) {
	define(strtoupper($key), $value);
}

$db = new PDO(DSN, USERNAME, PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($db) {
	echo 'connected';
} else {
	echo 'failed';
}