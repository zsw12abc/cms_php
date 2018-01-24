<?php include 'includes/admin_header.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
	<?php include 'includes/admin_navigation.php' ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Dashboard
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title"> Category Title </label>
                                <input type="text" name="cate_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
						<?php
						$query = "SELECT * FROM categories";
						$select_categories = $db->query($query);
						?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							while ($row = $select_categories->fetch()) :
								$cat_id = $row['cat_id'];
								$cat_title = $row['cat_title'];
								?>
                                <tr>
                                    <td><?php echo $cat_id ?></td>
                                    <td><?php echo $cat_title ?></td>
                                </tr>
							<?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include 'includes/admin_footer.php' ?>
