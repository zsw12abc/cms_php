<?php include 'includes/database.php'; ?>
<?php include 'includes/header.php'; ?>


    <!--NAVIGATION-->
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!--            <h1 class="page-header">-->
            <!--                Page Heading-->
            <!--                <small>Secondary Text</small>-->
            <!--            </h1>-->

			<?php
			$query = "SELECT * FROM posts WHERE post_status = 'published'";
			$select_posts = $db->query($query);
			while ($row = $select_posts->fetch()) :
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = date('M d Y', strtotime($row['post_date']));
				$post_image = $row['post_image'];
				$post_content = substr($row['post_content'], 0, 50);
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
			<?php endwhile; ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
		<?php include 'includes/sidebar.php'; ?>


    </div>
    <!-- /.row -->

    <hr>

<?php include 'includes/footer.php'; ?>