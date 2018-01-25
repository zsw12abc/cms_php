<?php
if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
	$select_post_query = 'SELECT * FROM posts WHERE post_id = ' . $post_id;
	$select_post = $db->query($select_post_query);
	$row = $select_post->fetch();


	$post_title = $row['post_title'];
	$post_author = $row['post_author'];
	$post_category_id = $row['post_category_id'];
	$post_status = $row['post_status'];
	$image = $row['post_image'];
	$post_tags = $row['post_tags'];
	$post_content = $row['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 0;
}

if (isset($_POST['update_post'])) {
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_tags = $_POST['post_tags'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 0;

	move_uploaded_file($post_image_temp, "../images/$post_image");
	if (empty($post_image)) {
		$post_image = $image;
	}

	$update_posts_query = "UPDATE posts SET 
post_category_id = '{$post_category_id}', 
post_title='{$post_title}', 
post_author='{$post_author}', 
post_date = now(), 
post_image='{$post_image}', 
post_content='{$post_content}', 
post_tags = '{$post_tags}', post_comment_count = '{$post_comment_count}', post_status = '{$post_status}' 
WHERE post_id = {$post_id}";
//	echo $update_posts_query;
	$update_posts = $db->query($update_posts_query);
	confirmQuery($update_posts);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <select class="form-control" id="post_category_id" name="post_category_id">
			<?php
			$update_query = 'SELECT * FROM categories';
			$update_categories = $db->query($update_query);
			confirmQuery($update_query);
			while ($row = $update_categories->fetch()) :
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				?>
                <option value="<?php echo $cat_id; ?>"
					<?php if ($cat_id === $post_category_id) {
						echo 'selected';
					} ?>
                ><?php echo $cat_title; ?></option>
			<?php
			endwhile;
			?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $image; ?> " alt="image" width="100">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" cols="30"
                  rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </div>

</form>