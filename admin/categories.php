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
                        <small>Categories</small>
                    </h1>
                    <div class="col-xs-6">
						<?php insert_categories() ?>
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="cat_title"> Add Category </label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>

                        <!--UPDATE CATEGORIES-->
						<?php include 'includes/update_categories.php'; ?>
                    </div>

                    <div class="col-xs-6">
						<?php delete_categories() ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php find_all_categories() ?>
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
