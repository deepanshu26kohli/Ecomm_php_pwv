<?php
require "inc.files/top.inc.php";
if (!isset($_SESSION['user_login'])) {
    header('location:index.php');
    die();
}
$uid = $_SESSION['user_id'];
if (isset($_GET['id'])) {
    $wid = $_GET['id'];
    $sql = sprintf("DELETE from `wishlist` where `id`='%s' and `user_id`='$uid'", $wid);
    mysqli_query($con, $sql);
}

$res = mysqli_query($con, "select `products`.`name`,`products`.`image`,`products`.`price`,`products`.`mrp`,`wishlist`.`id` from `products`,`wishlist` where `wishlist`.`product_id`=`products`.`id` and `wishlist`.`user_id`= '$uid'");

?>
<div class="ht__bradcaump__area" style="background-image:url('./images/bg/loginBannerImg.jpg');background-repeat:no-repeat;background-position:center;background-size:cover;margin-top:3rem;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>

                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="../media/product/<?php echo $row['image']; ?>" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#"><?php echo $row['name']; ?></a>
                                            <ul class="pro__prize">
                                                <li class="old__prize"><?php echo $row['mrp']; ?></li>
                                                <li><?php echo $row['price']; ?></li>
                                            </ul>
                                        </td>
                                        <td class="product-remove"><a href="wishlist.php?wishlist_id=<?php echo $row['id']; ?>" onclick="manage_cart('<?php echo $key; ?>','remove')"><i class="icon-trash icons"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="index.php">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">

                                    <a href="checkout.php">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function manage_cart(pid, type) {
        if (type == 'update') {
            var qty = jQuery('#' + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        console.log(qty)
        if (qty < 0) {
            alert("Please enter valid quantity ");
        } else {
            jQuery.ajax({
                url: 'managecart.php',
                type: 'post',
                data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
                success: function(result) {
                    if (type == 'update' || type == 'remove') {
                        window.location.href = window.location.href;
                    }
                    jQuery('.htc__qua').html(result);
                }
            });
        }
    }
</script>
<?php
require "inc.files/footer.inc.php";
?>