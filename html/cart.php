<?php
require "inc.files/top.inc.php";

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
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $key => $val) {
                                        $productArr = get_one_product("", $con, "", $key);
                                        $pname = $productArr[0]['name'];
                                        $mrp = $productArr[0]['mrp'];
                                        $price = $productArr[0]['price'];
                                        $image = $productArr[0]['image'];
                                        $qty = $val['qty'];
                                
                                ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="../media/product/<?php echo $image; ?>" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#"><?php echo $pname; ?></a>
                                            <ul class="pro__prize">
                                                <li class="old__prize"><?php echo $mrp; ?></li>
                                                <li><?php echo $price; ?></li>
                                            </ul>
                                        </td>
                                        <td class="product-price"><span class="amount"><?php echo $price; ?></span></td>
                                        <td class="product-quantity"><input type="number" id="<?php echo $key ?>qty" value="<?php echo $qty; ?>" />
                                            <br />
                                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','update')">update</a>
                                        </td>
                                        <td class="product-subtotal"><?php echo $qty * $price; ?></td>
                                        <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove')"><i class="icon-trash icons"></i></a></td>
                                    </tr>
                                    <?php }} ?>
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
            if( qty < 0){
                alert("Please enter valid quantity ");
            }
        else{    
        jQuery.ajax({
            url: 'managecart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href =  window.location.href;
                }
                jQuery('.htc__qua').html(result);
            }
        });}
    }
</script>
<?php
require "inc.files/footer.inc.php";
?>