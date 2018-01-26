<div class="well">
    <h4>LogIn</h4>
	<?php
	//include 'database.php';
	$logInToken = false;
	if (isset($_POST['login'])) :
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = $db->quote($username);
		$password = $db->quote($password);

		$users_query = 'SELECT * FROM users WHERE username = ' . $username;
		$users = $db->query($users_query);
		while ($user = $users->fetch()) :
			$user_password = $db->quote($user['user_password']);
			$user_name = $user['username'];
			$user_image = $user['user_image'];
			$user_email = $user['user_email'];
			?>


			<?php
			if ($password === "{$user_password}") { ?>
				<?php
				$logInToken = true;
			} else { ?>
                <p class="text-danger">Wrong Username or Passwords!!!</p>
			<?php } ?>
            <!-- /.input-group -->
		<?php
		endwhile;
	endif;
	?>

	<?php if ($logInToken) { ?>
        <div class="row text-center">
            <div class="col-md-6">
                <img src="images/users/<?php echo $user_image ?>" alt="avatar" width="100%">
            </div>
            <div class="col-md-6">
                <h5><?php echo $user_name; ?></h5>
                <p class="text-muted"><?php echo $user_email; ?></p>
            </div>
            <div class="my-5">
                <button class="btn btn-primary btn-block">Log Out</button>
            </div>
        </div>
	<?php } else { ?>
        <form action="" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Log In" name="login">
        </form>
	<?php } ?>


</div>
