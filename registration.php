<?php include 'includes/database.php'; ?>
<?php include 'includes/header.php'; ?>


<?php
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$username = $db->quote($username);
	$email = $db->quote($email);
	$password = $db->quote($password);
	if (!empty($username) && !empty($email) && !empty($password)) {


		$query = 'SELECT randSalt FROM users';
		$select_randsalt_query = $db->query($query);

		$row = $select_randsalt_query->fetch();
		$salt = $row['randSalt'];

		$query = "INSERT INTO users (username, user_email, user_password,user_date, user_role) VALUES ({$username},{$email},{$password}, now(), 'user')";
//		echo $query;
		$register_user_query = $db->query($query);
		$message = 'Your Registration has been submitted';
	} else {
		$message = 'Fields can not be empty';
	}
} else {
	$message = '';
}
?>

<!-- Navigation -->

<?php include 'includes/navigation.php'; ?>


<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <h6><?php echo $message ?></h6>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                   value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>
</div>


<?php include "includes/footer.php"; ?>
