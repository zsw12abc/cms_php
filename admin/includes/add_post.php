<?php
if (isset($_POST['create_post'])) {
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 0;

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$add_posts_query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)"
		. "VALUES('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
	$add_posts = $db->query($add_posts_query);
	confirmQuery($add_posts);
	echo '<p class="bg-success"><span class="text-muted">Post Published: </span>' . "<a href='posts.php'>View Posts</a></p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <select class="form-control" id="post_category_id" name="post_category_id">
			<?php
			$categories_query = 'SELECT * FROM categories';
			$get_categories = $db->query($categories_query);
			confirmQuery($categories_query);
			while ($row = $get_categories->fetch()) :
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				?>
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
			<?php
			endwhile;
			?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" id="post_status" name="post_status">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    </div>

</form>