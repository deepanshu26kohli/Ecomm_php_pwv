<?php
require './inc.files/top.inc.php';
$categories_id = "";
$name = "";
$mrp = "";
$price = "";
$qty = "";
$image = "";
$short_desc = "";
$description = "";
$meta_title = "";
$meta_desc = "";
$meta_keyword = "";
$msg = "";
if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = get_safe_val($con, $_GET['id']);
    $sql = sprintf("SELECT * FROM `products` WHERE `id` = %d", $id);
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);

    if ($check > 0) {

        $row = mysqli_fetch_assoc($res);

        $categories_id = $row['category_id'];
        $name = $row['name'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $qty = $row['qty'];
        $short_desc = $row['short_des'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header('location: product.php');
        die();
    }
}
if (isset($_POST['submit'])) {
    $categories_id = get_safe_val($con, $_POST['categories_id']);
    $name = get_safe_val($con, $_POST['name']);
    $mrp = get_safe_val($con, $_POST['mrp']);
    $price = get_safe_val($con, $_POST['price']);
    $qty = get_safe_val($con, $_POST['qty']);
    $short_desc = get_safe_val($con, $_POST['short_desc']);
    $description = get_safe_val($con, $_POST['description']);
    $meta_title = get_safe_val($con, $_POST['meta_title']);
    $meta_desc = get_safe_val($con, $_POST['meta_desc']);
    $meta_keyword = get_safe_val($con, $_POST['meta_keyword']);

    $sql = sprintf("SELECT * FROM `products` WHERE `name` = '%s'", $name);
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $msg = "Product already exists";
    } else {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            if($_FILES['image']['name'] != ""){
                $time = strtotime("now");
                $file_name =$time . $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_name =  $file_name . "." . explode("/",$file_type)[1];
                if (isFileTypeImg($file_type)){
                   if( move_uploaded_file($file_tmp, "./media/product/" . $file_name))
                   {
                      $sql = sprintf("UPDATE `products` set `name`='%s',`category_id`=%d,`mrp`=%f,`price`=%f,`qty`=%d,`short_des`='%s',`description`='%s',`meta_title`='%s',`meta_desc`='%s',`meta_keyword`='%s',`image`='%s' where `id` = %d", $name, $categories_id, $mrp, $price, $qty, $short_desc, $description, $meta_title, $meta_desc, $meta_keyword,$file_name,$id);
                    mysqli_query($con, $sql);
                   }
                
                    // die();
                }
            }else{
                $sql = sprintf("UPDATE `products` set `name`='%s',`category_id`=%d,`mrp`=%f,`price`=%f,`qty`=%d,`short_des`='%s',`description`='%s',`meta_title`='%s',`meta_desc`='%s',`meta_keyword`='%s',`image`='%s' where `id` = %d", $name, $categories_id, $mrp, $price, $qty, $short_desc, $description, $meta_title, $meta_desc, $meta_keyword,$file_name, $id);
                mysqli_query($con, $sql);
            }
           
        } else {
            $time = strtotime("now");
            $file_name =$time . $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_name =  $file_name . "." . explode("/",$file_type)[1];
            
            if (isFileTypeImg($file_type)){
                move_uploaded_file($file_tmp, "./media/product/" . $file_name);
                $sql = sprintf("INSERT into `products`(`name`,`category_id`,`mrp`,`price`,`qty`,`short_des`,`description`,`meta_title`,`meta_desc`,`meta_keyword`,`status`,`image`) values('%s',%d,%f, %f,%d,'%s','%s','%s','%s','%s',1,'%s')", $name, $categories_id, $mrp, $price, $qty, $short_desc, $description, $meta_title, $meta_desc, $meta_keyword,$file_name);
                mysqli_query($con, $sql);
            }
            else{
                $msg = "Upload images of type jpg and png only";
            } 
        }
        header('location: product.php');
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
                    <form method='post' enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Category</label>
                                <select name="categories_id" class="form-control">
                                    <option>Select Category</option>
                                    <?php
                                    $sql = sprintf("SELECT `id`,`categories` from `category` order by `categories` asc ");
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if ($row['id'] == $categories_id) {
                                            echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                        }
                                        echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="company" class=" form-control-label">Product Name</label>
                                <input type="text" name="name" placeholder="Enter Product Name" class="form-control" required value="<?php echo $name; ?>">
                            </div>


                            <div class="form-group">
                                <label for="company" class=" form-control-label">MRP</label>
                                <input type="number" step="0.1" name="mrp" placeholder="Enter Product MRP" class="form-control" required value="<?php echo $mrp; ?>">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Price</label>
                                <input type="number" step="0.1" name="price" placeholder="Enter Product Price" class="form-control" required value="<?php echo $price; ?>">
                            </div>

                            <div class="form-group">
                                <label for="company" class=" form-control-label">Product Quantity</label>
                                <input type="number" name="qty" placeholder="Enter Product Quantity" class="form-control" value="<?php echo $qty; ?>">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Product Image</label>
                                <input type="file" name="image" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Short Description</label>
                                <textarea type="text" name="short_desc" placeholder="Enter Product short desc" class="form-control"><?php echo $short_desc; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="company" class=" form-control-label">Description</label>
                                <textarea type="text" name="description" placeholder="Enter Product description" class="form-control"><?php echo $description; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="company" class=" form-control-label">Meta Title</label>
                                <textarea type="text" name="meta_title" placeholder="Enter Product Meta title" class="form-control"><?php echo $meta_title; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="company" class=" form-control-label">Meta description</label>
                                <textarea type="text" name="meta_desc" placeholder="Enter Product Meta Description" class="form-control"><?php echo $meta_desc; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="company" class=" form-control-label">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" placeholder="Enter Product Meta Keyword" class="form-control"><?php echo $meta_keyword; ?></textarea>
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