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
<div style="padding: 5rem; display:flex; align-items:center;justify-content:center;flex-direction:column;">
    <h1>Thank You!</h1>
    <h1>Your order has been placed successfully</h1>
</div>
<div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                              
                                                <th class="product-thumbnail">Order Id</th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr">Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Order status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid = $_SESSION['user_id'];
                                            $sqli = sprintf("SELECT * FROM `orders` where user_id = '%s'",$uid);
                                            $res = mysqli_query($con,$sqli);
                                            while ($row=mysqli_fetch_assoc($res)){
                                            ?>
                                            <tr>
                                            <td class="product-add-to-cart"><a href="my_order_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                                <td class="product-name"><?php echo $row['added_on'] ?></td>
                                                <td class="product-name"><?php echo $row['address'] ?>
                                                <?php echo $row['city'] ?>
                                                <?php echo $row['pincode'] ?>
                                                </td>
                                                <td class="product-name"><?php echo $row['payment_type'] ?></td>
                                                <td class="product-name"><?php echo $row['payment_status'] ?></td>
                                                <td class="product-name"><?php echo $row['order_status'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                      
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
require "inc.files/footer.inc.php";
?>