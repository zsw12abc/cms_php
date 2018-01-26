<!-- Posted Comments -->
<?php
$get_comments_query = 'SELECT * FROM comments WHERE comment_post_id = ' . $post_id;
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