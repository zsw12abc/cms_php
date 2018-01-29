<!--DELETE POST-->
<?php
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$delete_query = 'DELETE FROM posts WHERE post_id = ' . $delete_id;
	$delete_post = $db->query($delete_query);
	header('Location: posts.php');
}
?>

<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0">
            <select name="posts_filter_status" id="" class="form-control">
                <option value="">Select Options</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" class="btn btn-success" name="filter" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>
        <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (isset($_POST['checkBoxArray'])) {
			$checkBoxArray = $_POST['checkBoxArray'];
			foreach ($checkBoxArray as $checkBoxID) {
				$posts_filter_status = $_POST['posts_filter_status'];
				switch ($posts_filter_status) {
					case 'published':
						$update_query = "UPDATE posts SET post_status = '{$posts_filter_status}' WHERE post_id = " . $checkBoxID;
						$updated = $db->query($update_query);
						confirmQuery($updated);
						header('Location: posts.php');
						break;
					case 'draft':
						$update_query = "UPDATE posts SET post_status = '{$posts_filter_status}' WHERE post_id = " . $checkBoxID;
						$updated = $db->query($update_query);
						confirmQuery($updated);
						header('Location: posts.php');
						break;
					case 'delete':
						$delete_query = 'DELETE FROM posts WHERE post_id = ' . $checkBoxID;
						$delete_post = $db->query($delete_query);
						confirmQuery($delete_post);
						header('Location: posts.php');
						break;
				}
			}
		}
		$posts_query = 'SELECT * FROM posts';
		$select_posts = $db->query($posts_query);
		while ($row = $select_posts->fetch()):
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_category_id = $row['post_category_id'];
			$post_date = date('M d Y', strtotime($row['post_date']));
			$post_image = $row['post_image'];
			$post_comment_count = $row['post_comment_count'];
			$post_tags = $row['post_tags'];
			$post_status = $row['post_status'];
			$category_title_query = 'SELECT * FROM categories WHERE cat_id = ' . $post_category_id;
			$select_category = $db->query($category_title_query);
			$row = $select_category->fetch();
			$category_title = $row['cat_title'];
			?>
            <tr>
                <td><input class="checkBoxes" name="checkBoxArray[]" type="checkbox" value="<?php echo $post_id ?>">
                </td>
                <td><?php echo $post_id ?></td>
                <td><?php echo $post_title ?></td>
                <td><?php echo $post_author ?></td>
                <td><?php echo $category_title ?></td>
                <td><?php echo $post_status ?></td>
                <td><img width="100" src="../images/<?php echo $post_image ?>" alt="image"></td>
                <td><?php echo $post_tags ?></td>
                <td><?php echo $post_comment_count ?></td>
                <td><?php echo $post_date ?></td>
                <td><a href='posts.php?delete=<?php echo $post_id ?>'>Delete</td>
                <td><a href='posts.php?source=edit_post&id=<?php echo $post_id ?>'>Edit</td>
            </tr>
		<?php
		endwhile;
		?>
        </tbody>
    </table>
</form>