<?php include 'includes/database.php'; ?>
<?php include 'includes/header.php'; ?>


    <!--NAVIGATION-->
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


			<?php
			if (isset($_GET['category'])):
				$cat_id = $_GET['category'];
				$query = 'SELECT * FROM posts WHERE post_category_id = ' . $cat_id;
				$select_posts = $db->query($query); ?>
                <h1 class="page-header">
                    Category -
                    <small>
						<?php
						$cat_query = 'SELECT * FROM categories WHERE cat_id=' . $cat_id;
						$select_cat = $db->query($cat_query);
						$row = $select_cat->fetch();
						echo $cat_title = $row['cat_title'];
						?>
                    </small>
                </h1>

				<?php
				while ($row = $select_posts->fetch()) :
					$post_id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
					$post_date = date('M d Y', strtotime($row['post_date']));
					$post_image = $row['post_image'];
					$post_content = $row['post_content'];
					?>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?id=<?php echo $post_id ?>">Read More <span
                                class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
				<?php
				endwhile;
			endif;
			?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
		<?php include 'includes/sidebar.php'; ?>


    </div>
    <!-- /.row -->

    <hr>

<?php include 'includes/footer.php'; ?>