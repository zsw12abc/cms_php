<?php
/**
 * Created by PhpStorm.
 * User: shaowei
 * Date: 2018/1/25
 * Time: 下午2:24
 */

function insert_categories()
{
	global $db;
	if (isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];
		if ($cat_title === '' || empty($cat_title)) {
			echo ' <p class="text-muted">Please enter the name of category</p>';
		} else {
			$cat_title = $db->quote($cat_title);
			$add_query = 'INSERT INTO categories(cat_title) ' . "VALUE({$cat_title})";
			$create_category_query = $db->query($add_query);
			if (!$create_category_query) {
				die('Query Failed');
			}
		}
	}
} ?>
<?php
function find_all_categories()
{
	global $db;
	$query = 'SELECT * FROM categories';
	$select_categories = $db->query($query);
	while ($row = $select_categories->fetch()) :
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		?>
        <tr>
            <td><?php echo $cat_id ?></td>
            <td><?php echo $cat_title ?></td>
            <td><a href='categories.php?delete=<?php echo $cat_id ?>'>Delete</a></td>
            <td><a href='categories.php?edit=<?php echo $cat_id ?>'>Edit</a></td>
        </tr>
	<?php endwhile;
} ?>
<?php
function delete_categories()
{
	global $db;
	if (isset($_GET['delete'])) {
		$delete_cat_id = $_GET['delete'];
		$delete_query = 'DELETE FROM categories WHERE cat_id = ' . $delete_cat_id;
//							echo $delete_query;
		$delete_category_query = $db->query($delete_query);
		//refresh the page
		header('Location: categories.php');
	}
} ?>

<?php
function display_posts()
{
	global $db;
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
        </tr>
	<?php
	endwhile;
}

?>
