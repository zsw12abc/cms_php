<!--DELETE POST-->
<?php
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$delete_query = 'DELETE FROM posts WHERE post_id = ' . $delete_id;
	$delete_post = $db->query($delete_query);
	header('Location: posts.php');
}
?>

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
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
	<?php
	/**
	 * Created by PhpStorm.
	 * User: shaowei
	 * Date: 2018/1/25
	 * Time: 下午4:16
	 */

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
