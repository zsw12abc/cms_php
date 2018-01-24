<?php
/**
 * Created by PhpStorm.
 * User: shaowei
 * Date: 2018/1/24
 * Time: 下午10:28
 */

if (isset($_GET['edit'])) :
	$update_cat_id = $_GET['edit'];
	$update_query = 'SELECT * FROM categories WHERE cat_id = ' . $update_cat_id;
	$update_categories = $db->query($update_query);
	while ($row = $update_categories->fetch()) :
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		?>
        <form action="categories.php" method="post">
            <div class="form-group">
                <label for="cat_title"> Edit Category </label>
                <input type="text" name="cat_title" class="form-control"
                       value=<?php echo $cat_title ?>>
            </div>
            <div class="form-group">
                <label for="cat_id"> Category ID </label>
                <input type="text" name="cat_id" class="form-control"
                       value=<?php echo $cat_id ?> readonly>
            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary"
                       value="Update Category">
            </div>
        </form>
	<?php
	endwhile;
endif;
?>
<?php
if (isset($_POST['update'])) {
	$update_cat_title = $_POST['cat_title'];
	$update_cat_id = $_POST['cat_id'];
	$update_query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = " . $update_cat_id;
//	echo $update_query;
	$update_category_query = $db->query($update_query);
	if (!$update_category_query) {
		die('Query failed');
	}
}
?>