<?php
require "inc.files/top.inc.php";
$order_id = get_safe_val($con,$_GET['id'])
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
                                              
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-thumbnail">Product Image</th>
                                                <th class="product-thumbnail">Qty</th>
                                                <th class="product-thumbnail">Price</th>
                                                <th class="product-thumbnail">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid = $_SESSION['user_id'];
                                            $sqli = sprintf("SELECT distinct(order_detail.id) ,`order_detail`.* ,`products`.`name`,`products`.`image` from `order_detail`,`products`,`orders` where `order_detail`.`order_id`='%s' and `orders`.`user_id` = '%s' and `products`.`id` = `order_detail`.`product_id`",$order_id,$uid);
                                            // echo $sqli;
                                            $res = mysqli_query($con,$sqli);
                                            $total_price = 0;
                                            while ($row=mysqli_fetch_assoc($res)){
                                                $total_price = $total_price+($row['qty']*$row['price']);
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['name'] ?></td>
                                                <td class="product-name">  <img src="../media/product/<?php echo $row['image'] ?>" alt="full-image"></td>
                                                <td class="product-name"><?php echo $row['qty'] ?></td>
                                                <td class="product-name"><?php echo $row['price'] ?></td>
                                                <td class="product-name"><?php echo $row['qty']*$row['price'] ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                
                                                <td  colspan="3"></td>
                                                <td class="product-name">Total Price</td>
                                                <td class="product-name"><?php echo $total_price?></td>
                                            </tr>
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