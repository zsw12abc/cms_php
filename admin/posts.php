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
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						if (isset($_GET['source'])) {
							$source = $_GET['source'];
						} else {
							$source = '';
						}
						switch ($source) {
							case '200':
								echo $source;
								break;
							default:
								include 'view_all_posts.php';
                        }
						?>
                        </tbody>
                    </table>

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
