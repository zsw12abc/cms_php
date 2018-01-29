<?php
if (isset($_POST['create_user'])) {
	$username = $_POST['username'];
	$user_password = $_POST['user_password'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_email = $_POST['user_email'];
	$user_role = $_POST['user_role'];
	$user_image = $_FILES['image']['name'];
	$user_image_temp = $_FILES['image']['tmp_name'];
	$user_date = date('d-m-y');

	move_uploaded_file($user_image_temp, "../images/users/$user_image");

	$add_users_query = "INSERT INTO 
users(username, 
user_password, 
user_firstname, 
user_lastname, 
user_email, 
user_role, 
user_image, 
user_date)" . "VALUES('{$username}', 
'{$user_password}', 
'{$user_firstname}', 
'{$user_lastname}', 
'{$user_email}', 
'{$user_role}', 
'{$user_image}', 
now())";
	$add_users = $db->query($add_users_query);
	confirmQuery($add_users);
	echo '<p class="bg-success" ><span class="text-muted">User Created: </span>' . "<a href='users.php'>View Users</a></p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_author">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="user_role" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="create_user" value="Publish User" class="btn btn-primary">
    </div>

</form>