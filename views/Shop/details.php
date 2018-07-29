<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/25/2018
 * Time: 1:45 PM
 */
use yii\helpers\Html;

$picLinc = $book->Image!=Null?'@web/'.$book->Image:'@web/img/product-img/default.png';
?>
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <?php echo Html::img($picLinc, ['alt' =>  $picLinc]);
            echo Html::img($picLinc, ['alt' =>  $picLinc]);
            echo Html::img($picLinc, ['alt' =>  $picLinc]);
                  ?>
        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span><?=$book->Author ?></span>
        <a href="cart.html">
            <h2><?=$book->Title ?></h2>
        </a>
        <p class="product-price"><?=$book->Price ?>$</p>
        <p class="product-desc"><?=$book->Description ?></p>

        <!-- Form -->
        <div class="cart-form clearfix">
            <!-- Select Box -->
            <div class="select-box d-flex mt-50 mb-30">
                <select name="select" id="productSize" class="mr-5">
                    <option value="value">Cover: Hard</option>
                    <option value="value">Cover: Soft</option>
                </select>
            </div>
            <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <button  name="addtocart" value="5" class="btn essence-btn"><a href="/cart/addtocart?Id=<?php echo $book->Id?>">Add to cart</a></button>
                <!-- Favourite -->
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->
