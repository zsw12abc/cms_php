<!--DELETE comment-->
<?php
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$delete_query = 'DELETE FROM comments WHERE comment_id = ' . $delete_id;
	$delete_comment = $db->query($delete_query);
	header('Location: comments.php');
}
if (isset($_GET['approve'])) {
	$id = $_GET['approve'];
	$approve_query = "UPDATE comments SET 
comment_status = 'approved' 
WHERE comment_id = {$id}";
	$approve_comment = $db->query($approve_query);
	header('Location: comments.php');
}
if (isset($_GET['disapprove'])) {
	$id = $_GET['disapprove'];
	$approve_query = "UPDATE comments SET 
comment_status = 'disapproved' 
WHERE comment_id = {$id}";
	$approve_comment = $db->query($approve_query);
	header('Location: comments.php');
}
?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Post</th>
        <th>Author</th>
        <th>Email</th>
        <th>Content</th>
        <th>Status</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Disapprove</th>
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

	$comments_query = 'SELECT * FROM comments';
	$select_comments = $db->query($comments_query);
	while ($row = $select_comments->fetch()):
		$comment_id = $row['comment_id'];
		$comment_post_id = $row['comment_post_id'];
		$comment_author = $row['comment_author'];
		$comment_email = $row['comment_email'];
		$comment_content = substr($row['comment_content'], 0, 15);
		$comment_status = $row['comment_status'];
		$comment_date = date('M d Y', strtotime($row['comment_date']));
		$post_title_query = 'SELECT * FROM posts WHERE post_id = ' . $comment_post_id;
		$select_post = $db->query($post_title_query);
		$row = $select_post->fetch();
		$comment_post_title = $row['post_title'];
		?>
        <tr>
            <td><?php echo $comment_id ?></td>
            <td><?php echo $comment_post_title ?></td>
            <td><?php echo $comment_author ?></td>
            <td><?php echo $comment_email ?></td>
            <td><?php echo $comment_content ?></td>
            <td><?php echo $comment_status ?></td>
            <td><?php echo $comment_date ?></td>
            <td><a href='comments.php?approve=<?php echo $comment_id ?>'>Approve</td>
            <td><a href='comments.php?disapprove=<?php echo $comment_id ?>'>Disapprove</td>
            <td><a href='comments.php?delete=<?php echo $comment_id ?>'>Delete</td>
            <td><a href='comments.php?source=edit_comment&id=<?php echo $comment_id ?>'>Edit</td>
        </tr>
	<?php
	endwhile;
	?>
    </tbody>
</table>
