<?php include "includes/database.php"; ?>
<?php include "includes/header.php"; ?>


    <!--NAVIGATION-->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			<?php
			if (isset($_GET['id'])):
				$post_id = $_GET['id'];
				$query = 'SELECT * FROM posts WHERE post_id = ' . $post_id;
				$select_posts = $db->query($query);
				while ($row = $select_posts->fetch()) :
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
					$post_date = date('M d Y', strtotime($row['post_date']));
					$post_image = $row['post_image'];
					$post_content = $row['post_content'];
					?>

                    <!-- Blog Post -->
                    <h1 class="page-header">
                        <a href="post.php?id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h1>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>
				<?php
				endwhile;
			endif;
			?>

			<?php
			include 'includes/comment.php';
			?>


        </div>

        <!-- Blog Sidebar Widgets Column -->
		<?php include "includes/sidebar.php"; ?>


    </div>
    <!-- /.row -->

    <hr>

<?php include "includes/footer.php"; ?>