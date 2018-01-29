<!-- Blog Comments -->
<?php
if (isset($_POST['comment_submit'])) {
	$comment_post_id = $post_id;
	$comment_author = $_POST['comment_author'];
	$comment_email = $_POST['comment_email'];
	$comment_content = $_POST['comment_content'];
//	$comment_status = $_POST['comment_status'];
	$comment_date = date('d-m-y');
	if (empty($comment_author) || empty($comment_email) || empty($comment_content)) :?>
        <script>alert("Field cannot be empty!")</script>
	<?php else :
		$add_comment_query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_date)"
			. "VALUES('{$comment_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}', now())";
		$add_comment = $db->query($add_comment_query);
	endif;

	$post_query = 'SELECT * FROM posts WHERE post_id = ' . $comment_post_id;
	$post = $db->query($post_query)->fetch();
	$post_comment_count = $post['post_comment_count'] + 1;
	$update_post_query = "UPDATE posts SET post_comment_count = '{$post_comment_count}' WHERE post_id = {$post_id}";
	$update_post = $db->query($update_post_query);
}
?>

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form method="post" action="">
        <div class="form-row">
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" name="comment_author" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="comment_email" id="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="comment">Comment: </label>
            <textarea class="form-control" name="comment_content" rows="3" id="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
    </form>
</div>

<hr>
<!-- Posted Comments -->
<?php
$get_comments_query = 'SELECT * FROM comments WHERE comment_post_id = ' . $post_id . " AND comment_status = 'approved'";
$comment = $db->query($get_comments_query);
?>

<!-- Comment -->
<?php
while ($row = $comment->fetch()):
	$comment_author = $row['comment_author'];
	$comment_email = $row['comment_email'];
	$comment_content = $row['comment_content'];
	$comment_date = date('M d Y', strtotime($row['comment_date']));
	?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author ?>
                <span class="text-muted">(<?php echo $comment_email ?>)</span>
                <small><?php echo $comment_date ?></small>
            </h4>
			<?php echo $comment_content ?>
        </div>
    </div>
<?php endwhile; ?>

<!-- Comment -->
<!--<div class="media">-->
<!--    <a class="pull-left" href="#">-->
<!--        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--    </a>-->
<!--    <div class="media-body">-->
<!--        <h4 class="media-heading">Start Bootstrap-->
<!--            <small>August 25, 2014 at 9:30 PM</small>-->
<!--        </h4>-->
<!--        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.-->
<!--        Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi-->
<!--        vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!-- Nested Comment -->
<!--        <div class="media">-->
<!--            <a class="pull-left" href="#">-->
<!--                <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--            </a>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">Nested Start Bootstrap-->
<!--                    <small>August 25, 2014 at 9:30 PM</small>-->
<!--                </h4>-->
<!--                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin-->
<!--                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce-->
<!--                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--            </div>-->
<!--        </div>-->
<!-- End Nested Comment -->
<!--    </div>-->
<!--</div>-->