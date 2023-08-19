<?php
require './inc.files/top.inc.php';
$categories_id = "";
$name = "";
$mrp = "";
$price = "";
$qty = "";
$image = "";
$short_des = "";
$description = "";
$meta_title = "";
$meta_desc = "";
$meta_keyword = "";
$msg="";
if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = get_safe_val($con, $_GET['id']);
    $sql = sprintf("SELECT * FROM `category` WHERE `id` = %d", $id);
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location: categories.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $categories = get_safe_val($con, $_POST['categories']);
    $sql = sprintf("SELECT * FROM `category` WHERE `categories` = '%s'", $categories);
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $msg = "Category already exists";
    } else {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $sql = sprintf("UPDATE `category` set `categories` = '%s' where id = %d", $categories, $id);
            mysqli_query($con, $sql);
        } else {
            $sql = sprintf("INSERT into `category`(`categories`,`status`) values('%s' , '1' )", $categories);
            mysqli_query($con, $sql);
        }
        header('location: categories.php');
        die();
    }
}

?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-25">
                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form method='post'>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Category</label>
                                <select name="categories_id" class="form-control">
                                    <option>Select Category</option>
                                    <?php
                                    $sql = sprintf("SELECT `id`,`categories` from `category` order by `categories` asc ");
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Product Name</label>
                                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control" required value="<?php echo $name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">MRP</label>
                                    <input type="text" name="mrp" placeholder="Enter Product MRP" class="form-control" required value="<?php echo $mrp; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Price</label>
                                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required value="<?php echo $price; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Product Quantity</label>
                                    <input type="text" name="qty" placeholder="Enter Product Quantity" class="form-control" value="<?php echo $qty; ?>">
                                </div>
                            </div>
                           
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Product Image</label>
                                    <input type="file" name="image" required  class="form-control" >
                                </div>
                          

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Short Description</label>
                                    <textarea type="text" name="shortDesc" placeholder="Enter Product short desc" class="form-control" value="<?php echo $short_des; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Description</label>
                                    <textarea type="text" name="description" placeholder="Enter Product description" class="form-control" value="<?php echo $description; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Meta Title</label>
                                    <textarea type="text" name="meta_title" placeholder="Enter Product Meta title" class="form-control" value="<?php echo $meta_title; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Meta description</label>
                                    <textarea type="text" name="meta_desc" placeholder="Enter Product Meta Description" class="form-control" value="<?php echo $meta_desc; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Meta Keyword</label>
                                    <textarea type="text" name="meta_desc" placeholder="Enter Product Meta Keyword" class="form-control" value="<?php echo $meta_keyword; ?>"></textarea>
                                </div>
                            </div>
                            <button id="payment-button" name='submit' type="submit" class="btn btn-sm btn-info btn-block w-25">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <p style="color:red;"><?php echo $msg; ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require './inc.files/footer.inc.php';
?>