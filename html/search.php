<?php
require "inc.files/top.inc.php";
$str = mysqli_real_escape_string($con, $_GET['str']);
if($str!=0){
    $get_product = search("", $con, "","", $str);
}
else{
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
?>
<div class="body__overlay"></div>

<div class="ht__bradcaump__area" style="background-image:url('./images/bg/loginBannerImg.jpg');background-repeat:no-repeat;background-position:center;background-size:cover;margin-top:3rem;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Search</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">

                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <?php
                             
                                if(count($get_product) > 0){
                                foreach ($get_product as $list) {
                               
                                ?>
                                
                                    <!-- Start Single Product -->
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                        <div class="category">
                                            <div style=" height:40vh; width:15vw; background-image:url('../media/product/<?php echo $list['image']; ?>'); background-position:center;background-size:cover;background-repeat:no-repeat" class="ht_cat_thumb">
                                                <a href="product-details.html">
                                                </a>
                                            </div>
                                            <div class="fr__hover__info">
                                                <ul class="product__action">
                                                    <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                    <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                    <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="fr__product__inner">
                                                <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name']; ?></a></h4>
                                                <ul class="fr__pro__prize">
                                                    <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                                    <li>$<?php echo $list['price']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                
                                }
                                else{
                                    echo "No products available for this search";
                                  }
                              
                                ?>
                                <!-- End Single Product -->
                            </div>
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/1.jpg" alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/2.jpg" alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/3.jpg" alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/4.jpg" alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Brand Area -->
 
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<?php
require "inc.files/footer.inc.php";
?>