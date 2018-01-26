<?php
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
	$user_email = $user['user_email'];

	if ($password === "{$user_password}") {
		header('Location: ../admin');
	} else {
		header('Location: ../index.php');
	}
}


