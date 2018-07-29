<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

function renderProduct($product){
    $picLinc = $product->Image!=Null?'@web/'.$product->Image:'@web/img/product-img/default.png';
    echo " <!-- Single Product -->
                    <div class=\"single-product-wrapper\">
                        <!-- Product Image -->
                        <div class=\"product-img\">";

                        echo Html::img($picLinc, ['alt' =>  $picLinc]);
                        echo  Html::img($picLinc, ['alt' => $picLinc, 'class'=>'hover-img']);
                              echo"           
                            <!-- Product Badge -->
                            <div class=\"product-badge new-badge\"> 
                                <span>New</span>
                            </div>

                            <!-- Favourite -->
                            <div class=\"product-favourite\">
                                <a href=\"#\" class=\"favme fa fa-heart\"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class=\"product-description\">
                            <span>$product->Author</span>
                            <a href=\"shop/details?id=$product->Id\">
                                <h6>$product->Title</h6>
                            </a>
                            
                            <p class=\"product-price\">$ $product->Price</p>

                            <!-- Hover Content -->
                            <div class=\"hover-content\">
                                <!-- Add to Cart -->
                                <div class=\"add-to-cart-btn\">
                                    <a href=\"cart/addtocart?Id=$product->Id\" class=\"btn essence-btn\">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>";
}
function renderCategory($category){
    echo "<div class=\"col-12 col-sm-6 col-md-4\">
                <div class=\"single_catagory_area d-flex align-items-center justify-content-center bg-img \" style=\"background-image: url(img/bg-img/breadcumb.jpg);\">
                    <div class=\"catagory-content\">
                        <a href=\"/shop?categoryId=$category->Id\">$category->Title</a>
                    </div>
                </div>
            </div>";
}
$this->title = 'Shop Index';
?>
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6>asoss</h6>
                    <h2>Best Books</h2>
                    <a href="/shop" class="btn essence-btn">view store</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <?php foreach ($categories as $key=>$item){
                renderCategory($item);
            } ?>

        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/bg-5.jpg);">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>-60%</h6>
                            <h2>Global Sale</h2>
                            <a href="/shop" class="btn essence-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Books</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    <?php foreach ($books as $key=>$val){
                        renderProduct($val);
                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand1.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand2.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand3.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand4.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand5.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand6.png" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->