<?php
if (isset($_GET['id'])) {
	$comment_id = $_GET['id'];
	$select_comment_query = 'SELECT * FROM comments WHERE comment_id = ' . $comment_id;
	$select_comment = $db->query($select_comment_query);
	$row = $select_comment->fetch();

	$comment_post_id = $row['comment_post_id'];
	$comment_author = $row['comment_author'];
	$comment_email = $row['comment_email'];
	$comment_content = $row['comment_content'];
	$comment_status = $row['comment_status'];
	$comment_date = date('M d Y', strtotime($row['comment_date']));
	$post_title_query = 'SELECT * FROM posts WHERE post_id = ' . $comment_post_id;
	$select_post = $db->query($post_title_query);
	$row = $select_post->fetch();
	$comment_post_title = $row['post_title'];
}

if (isset($_POST['update_comment'])) {
	$comment_post_id = $_POST['comment_post_id'];
	$comment_author = $_POST['comment_author'];
	$comment_email = $_POST['comment_email'];
	$comment_content = $_POST['comment_content'];
	$comment_status = $_POST['comment_status'];
	$comment_date = date('d-m-y');

	$update_comments_query = "UPDATE comments SET 
comment_post_id = '{$comment_post_id}', 
comment_author='{$comment_author}', 
comment_date = now(), 
comment_email='{$comment_email}', 
comment_content='{$comment_content}', 
comment_status = '{$comment_status}' 
WHERE comment_id = {$comment_id}";
//	echo $update_comments_query;
	$update_comments = $db->query($update_comments_query);
	confirmQuery($update_comments);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="comment_category_id">Comment Post</label>
        <select class="form-control" id="comment_post_id" name="comment_post_id">
			<?php
			$update_query = 'SELECT * FROM posts';
			$update_posts = $db->query($update_query);
			confirmQuery($update_query);
			while ($row = $update_posts->fetch()) :
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				?>
                <option value="<?php echo $post_id; ?>"
					<?php if ($post_id === $comment_post_id) {
						echo 'selected';
					} ?>
                ><?php echo $post_title; ?></option>
			<?php
			endwhile;
			?>
        </select>
    </div>
    <div class="form-group">
        <label for="comment_author">Comment Author</label>
        <input type="text" class="form-control" name="comment_author" value="<?php echo $comment_author ?>">
    </div>
    <div class="form-group">
        <label for="comment_status">Comment Email</label>
        <input type="text" class="form-control" name="comment_email" value="<?php echo $comment_email ?>">
    </div>
    <div class="form-group">
        <label for="comment_content">Comment Content</label>
        <textarea type="text" class="form-control" name="comment_content" cols="30"
                  rows="10"><?php echo $comment_content ?></textarea>
    </div>
    <div class="form-group">
        <label for="comment_status">Comment Status</label>
        <select class="form-control" name="comment_status" id="comment_status">
            <option value="approved"
				<?php
				if ($comment_status == 'approved') {
					echo 'selected';
				}
				?>
            >Approved
            </option>
            <option value="disapproved"
				<?php
				if ($comment_status == 'disapproved') {
					echo 'selected';
				}
				?>
            >Disapproved
            </option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="update_comment" value="Update Comment" class="btn btn-primary">
    </div>

</form>