<?php
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
	$select_user_query = 'SELECT * FROM users WHERE user_id = ' . $user_id;
	$select_user = $db->query($select_user_query);
	$row = $select_user->fetch();


	$user_id = $row['user_id'];
	$username = $row['username'];
	$user_password = $row['user_password'];
	$user_firstname = $row['user_firstname'];
	$user_lastname = $row['user_lastname'];
	$user_email = $row['user_email'];
	$user_image = $row['user_image'];
	$user_role = $row['user_role'];
	$user_date = date('M d Y', strtotime($row['user_date']));
}

if (isset($_POST['update_user'])) {
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
	if (empty($user_image)) {
		$get_image = 'SELECT * FROM users WHERE user_id = ' . $user_id;
		$image = $db->query($get_image);
		$row = $image->fetch();
		$user_image = $row['user_image'];
	}

	$query = 'SELECT randSalt FROM users';
	$select_randsalt_query = $db->query($query);

	$row = $select_randsalt_query->fetch();
	$salt = $row['randSalt'];

	$user_password = crypt($user_password, $salt);

	$update_users_query = "UPDATE users SET 
username = '{$username}', 
user_password='{$user_password}', 
user_firstname='{$user_firstname}', 
user_lastname='{$user_lastname}', 
user_email='{$user_email}', 
user_image='{$user_image}', 
user_role='{$user_role}', 
user_date = now() 
WHERE user_id = {$user_id}";
	$update_users = $db->query($update_users_query);
	confirmQuery($update_users);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_title">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    <div class="form-group">
        <label for="user_title">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    <div class="form-group">
        <label for="user_title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div>
    <div class="form-group">
        <label for="user_title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>
    <div class="form-group">
        <label for="user_author">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <img src="../images/users/<?php echo $user_image; ?> " alt="image" width="100">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="user_role" class="form-control">
            <option value="admin"
				<?php
				if ($user_role === 'admin') {
					echo 'selected';
				} ?>
            >Admin
            </option>
            <option value="user"
				<?php
				if ($user_role === 'user') {
					echo 'selected';
				} ?>
            >User
            </option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="update_user" value="Update Post" class="btn btn-primary">
    </div>

</form>