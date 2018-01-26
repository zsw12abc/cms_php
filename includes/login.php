<?php
session_start();
include 'database.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = $db->quote($username);
	$password = $db->quote($password);

	$users_query = 'SELECT * FROM users WHERE username = ' . $username;
	$users = $db->query($users_query);
	$user = $users->fetch();
	$user_password = $db->quote($user['user_password']);
	$user_name = $user['username'];
	$user_image = $user['user_image'];
	$user_firstname = $user['user_firstname'];
	$user_lastname = $user['user_lastname'];
	$user_email = $user['user_email'];
	$user_role = $user['user_role'];

	if ($password === "{$user_password}") {
		$_SESSION['username'] = $user_name;
		$_SESSION['firstname'] = $user_firstname;
		$_SESSION['lastname'] = $user_lastname;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['user_image'] = $user_image;
		$_SESSION['user_role'] = $user_role;
		header('Location: ../admin');
	} else {
		header('Location: ../index.php');
	}
}


