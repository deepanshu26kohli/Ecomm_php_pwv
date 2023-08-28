<?php
require "inc.files/top.inc.php";
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
$cart_total = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_one_product("", $con, "", $key);
    $price = $productArr[0]['price'];
    $qty = $val['qty'];
    $cart_total += ($price * $qty);
}
if (isset($_POST["submit"])) {
    $address = get_safe_val($con, $_POST['address']);
    $city = get_safe_val($con, $_POST['city']);
    $pincode = get_safe_val($con, $_POST['pincode']);
    $payment_type = get_safe_val($con, $_POST['payment_type']);
    $user_id = $_SESSION['user_id'];
    $total_price = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');
    $order_sqli = sprintf("INSERT into `orders`(`user_id`,`address`,`city`,`pincode`,`payment_type`,`payment_status`,`added_on`,`total_price`,`order_status`) VALUES(%d,'%s','%s',%d,'%s','%s','%s',%f,'%s')", $user_id, $address, $city, $pincode, $payment_type, $payment_status, $added_on, $total_price, $order_status);
    mysqli_query($con, $order_sqli);

    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_one_product("", $con, "", $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $order_sqli = sprintf("INSERT into `order_detail`(`order_id`,`product_id`,`qty`,`price`) VALUES(%d,%d,%d,%f)", $order_id, $key, $qty, $price);
        mysqli_query($con, $order_sqli);
    }
    unset($_SESSION['cart']);
    ?>
        <script>
            window.location.href = 'thankyou.php';
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
                                                <h5 class="checkout-method__title">Login</h5>
                                                <form id="login-form" method="post">
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="text" name="login_name" id="login_email" placeholder="Your Email*" style="width:100%">
                                                        </div>
                                                    </div>
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                        </div>
                                                    </div>

                                                    <div class="contact-btn">
                                                        <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <h5 class="checkout-method__title">Register</h5>
                                                <form id="register-form" method="post">
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">

                                                        </div>
                                                    </div>
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                                                        </div>
                                                    </div>
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                                        </div>
                                                    </div>
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                        </div>
                                                    </div>

                                                    <div class="contact-btn">
                                                        <button type="button" class="fv-btn" onclick="user_register()">Register</button>
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
                            <form method="post">
                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="accordion__title">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            COD<input type="radio" name="payment_type" value="cod" required> &nbsp; &nbsp;
                                            Payu<input type="radio" name="payment_type" value="payu" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="single-method">
                                    <input type="submit" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $cart_total = 0;
                            foreach ($_SESSION['cart'] as $key => $val) {
                                $productArr = get_one_product("", $con, "", $key);
                                $pname = $productArr[0]['name'];
                                $mrp = $productArr[0]['mrp'];
                                $price = $productArr[0]['price'];
                                $image = $productArr[0]['image'];
                                $qty = $val['qty'];
                                $cart_total += ($price * $qty);
                        ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="../media/product/<?php echo $image; ?>" alt="product img" />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname; ?></a>
                                        <span class="price"><?php echo $price * $qty; ?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
                        <?php }
                        } ?>
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
    function user_register() {
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#mobile").val();
        var password = jQuery("#password").val();
        var is_error = "";
        if (name == "" || email == "" || mobile == "" || password == "") {
            alert("Please enter all fields");
        } else {
            jQuery.ajax({
                url: 'register_submit.php',
                type: 'post',
                data: '&name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
                success: function(result) {
                    alert(result);
                }
            });
        }
    }

    function user_login() {
        var email = jQuery("#login_email").val();
        var password = jQuery("#login_password").val();
        var is_error = "";
        if (email == "" || password == "") {
            alert("Please enter all fields");
        } else {
            jQuery.ajax({
                url: 'login_submit.php',
                type: 'post',
                data: 'email=' + email + '&password=' + password,
                success: function(result) {
                    alert(result);
                }
            });
            window.location.href = window.location.href;
        }

    }

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
                    window.location.href = window.location.href;
                }
                jQuery('.htc__qua').html(result);
            }
        });
    }
</script>
<?php
require "inc.files/footer.inc.php";
?>