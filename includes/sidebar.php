<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- LogIn Well -->
    <div class="well">
		<?php if (isset($_SESSION['username'])): ?>
            <h4>User Info</h4>
            <div class="row text-center">
                <div class="col-md-6">
                    <img src="images/users/<?php echo $_SESSION['user_image']; ?>" alt="avatar" width="100"
                         height="100">
                </div>
                <div class="col-md-6 text-left">
                    <h4><b><?php echo $_SESSION['username']; ?></b></h4>
                    <p class="text-muted"><?php echo $_SESSION['user_email']; ?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <a href="includes/logout.php" class="btn btn-primary btn-block">Log Out</a>
            </div>
		<?php else: ?>
            <h4>LogIn</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Log In" name="login">
            </form>

		<?php endif; ?>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
				<?php
				$query = 'SELECT * FROM categories';
				$select_categories = $db->query($query);
				?>
                <ul class="list-unstyled">
					<?php
					while ($row = $select_categories->fetch()) {
						$cat_title = $row['cat_title'];
						$cat_id = $row['cat_id'];
						echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
					}
					?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
	<?php include 'widget.php' ?>

</div>