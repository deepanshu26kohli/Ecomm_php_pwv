<?php
require "inc.files/top.inc.php";
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
?>
<!-- Start Bradcaump area -->
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
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <div class="accordion__title">
                                Checkout Method
                            </div>
                            <div class="accordion__body">
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <form action="#">
                                                    <h5 class="checkout-method__title">Login</h5>
                                                    <div class="single-input">
                                                        <label for="user-email">Email Address</label>
                                                        <input type="email" id="user-email">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-pass">Password</label>
                                                        <input type="password" id="user-pass">
                                                    </div>
                                                    <p class="require">* Required fields</p>
                                                    <div class="dark-btn">
                                                        <a href="#">LogIn</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <form action="#">
                                                    <h5 class="checkout-method__title">Register</h5>
                                                    <div class="single-input">
                                                        <label for="user-email">Name</label>
                                                        <input type="email" id="user-email">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-email">Email Address</label>
                                                        <input type="email" id="user-email">
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="user-pass">Password</label>
                                                        <input type="password" id="user-pass">
                                                    </div>
                                                    <div class="dark-btn">
                                                        <a href="#">Register</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__title">
                                Address Information
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" placeholder="First name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Street Address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Apartment/Block/House (optional)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="City/State">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Post code/ zip">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="email" placeholder="Email address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Phone number">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="accordion__title">
                                payment information
                            </div>
                            <div class="accordion__body">
                                <div class="paymentinfo">
                                    <div class="single-method">
                                        <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Check/ Money Order</a>
                                    </div>
                                    <div class="single-method">
                                        <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Credit Card</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                    <?php
                    if(isset($_SESSION['cart'])){
                        $cart_total = 0;
                                foreach ($_SESSION['cart'] as $key => $val) {
                                    $productArr = get_one_product("", $con, "", $key);
                                    $pname = $productArr[0]['name'];
                                    $mrp = $productArr[0]['mrp'];
                                    $price = $productArr[0]['price'];
                                    $image = $productArr[0]['image'];
                                    $qty = $val['qty'];
                                    $cart_total += ($price*$qty);
                                ?>
                        <div class="single-item">
                            <div class="single-item__thumb">
                            <img src="../media/product/<?php echo $image; ?>" alt="product img" />
                            </div>
                            <div class="single-item__content">
                                <a href="#"><?php echo $pname; ?></a>
                                <span class="price"><?php echo $price*$qty; ?></span>
                            </div>
                            <div class="single-item__remove">
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove')"><i class="icon-trash icons"></i></a>
                            </div>
                        </div>
                            <?php } }?>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price"><?php echo $cart_total; ?></span>
                    </div>
                </div>
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
        jQuery.ajax({
            url: 'managecart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = window.location.href ;
                }
                jQuery('.htc__qua').html(result);
            }
        });
    }
</script>
<?php
require "inc.files/footer.inc.php";
?>