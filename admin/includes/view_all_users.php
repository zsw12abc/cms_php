<!--DELETE users-->
<?php
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$delete_query = 'DELETE FROM users WHERE user_id = ' . $delete_id;
	$delete_user = $db->query($delete_query);
	header('Location: users.php');
}
?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
        <th>Register Date</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
	<?php
	/**
	 * Created by PhpStorm.
	 * User: shaowei
	 * Date: 2018/1/25
	 * Time: 下午4:16
	 */

	$users_query = 'SELECT * FROM users';
	$select_users = $db->query($users_query);
	while ($row = $select_users->fetch()):
		$user_id = $row['user_id'];
		$username = $row['username'];
		$user_password = $row['user_password'];
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_image = $row['user_image'];
		$user_role = $row['user_role'];
		$user_date = date('M d Y', strtotime($row['user_date']));
		?>
        <tr>
            <td><?php echo $user_id ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_password; ?></td>
            <td><?php echo $user_firstname ?></td>
            <td><?php echo $user_lastname ?></td>
            <td><?php echo $user_email ?></td>
            <td><img width="50" height="50" src="../images/users/<?php echo $user_image ?>" alt="image"></td>
            <td><?php echo $user_role ?></td>
            <td><?php echo $user_date ?></td>
            <td><a href='users.php?delete=<?php echo $user_id ?>'>Delete</td>
            <td><a href='users.php?source=edit_user&id=<?php echo $user_id ?>'>Edit</td>
        </tr>
	<?php
	endwhile;
	?>
    </tbody>
</table>
