<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/25/2018
 * Time: 1:45 PM
 */
use yii\helpers\Html;
use yii\helpers\Url;


function renderProduct($product){

    $picLinc = $product->Image!=Null?'@web/'.$product->Image:'@web/img/product-img/default.png';
    echo "<!-- Single Product -->
                        <div class=\"col-12 col-sm-6 col-lg-4\">
                            <div class=\"single-product-wrapper\">
                                <!-- Product Image -->
                                <div class=\"product-img\">
                                  ";

                                    echo Html::img($picLinc, ['alt' =>  $picLinc]);
                                    echo  Html::img($picLinc, ['alt' =>  $picLinc, 'class'=>'hover-img']);
                                          echo "<!-- Product Badge -->
                                     <div class=\"product-badge new-badge\"> 
                                        <span>New</span>
                                    </div>
                                    <!-- Favourite -->
                                    <div class=\"product-favourite\">
                                        <a href=\"/shop/details?id=$product->Id\" class=\"favme fa fa-heart\"></a>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class=\"product-description\">
                                    <span>$product->Title</span>
                                    <a href=\"/shop/details?id=$product->Id\">
                                        <h6>$product->Author</h6>
                                    </a>
                                    <p class=\"product-price\">$ $product->Price </p>

                                    <!-- Hover Content -->
                                    <div class=\"hover-content\">
                                        <!-- Add to Cart -->
                                        <div class=\"add-to-cart-btn\">
                                        
                                            <a href=\"/cart/addtocart?Id=$product->Id\" class=\"btn essence-btn\">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
}
function renderPadination($paginationId,$books,$overalBooksAmount=0){

    if($overalBooksAmount/9+1<=1)
        return;

    $prev = $paginationId>1?$paginationId:1;
    $next = $paginationId+1<ceil($overalBooksAmount/9)?$paginationId+1:ceil($overalBooksAmount/9);

    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/shop?paginationId=$prev\"><i class=\"fa fa-angle-left\"></i></a></li>";

    for($i=1;$i<=ceil($overalBooksAmount/9);$i++){
        echo "<li class=\"page-item\"><a class=\"page-link\"href=\"/shop?paginationId=$i\">$i</a></li>";
    }

    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/shop?paginationId=$next\"><i class=\"fa fa-angle-right\"></i></a></li>";

}
function renderCategories($categories){

    foreach ($categories as $key=>$value)
        echo "<!--  Catagories  --> 
             <li  data-target=\"#clothing\">
                  <a href=\"/shop?categoryId=$value->Id\">$value->Title</a> 
                </li>";
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(../img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>books</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Catagories</h6>

                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <?php renderCategories($categories) ?>
                           </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Filter by</h6>
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Price</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">Range: $49.00 - $360.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Authors</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="/shop?author=Franz%20Kafka">Kafka</a></li>
                                <li><a href="/shop?author=Lowrence%20Krauss">Krauss</a></li>
                                <li><a href="/shop?author=Richard%20Dawkins">Dawkins</a></li>
                                <li><a href="/shop?author=Donald%20Knuth">Knuth</a></li>
                                <li><a href="/shop?author=Stephen%20Ritchie">Ritchie</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span><?= isset($overalBooksAmount)?$overalBooksAmount:0?></span> products found</p>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <p>Sort by:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="value">Highest Rated</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Price: $$ - $</option>
                                            <option value="value">Price: $ - $$</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($books as $key=>$value ) renderProduct($value);?>

                    </div>
                </div>
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">

                        <?php renderPadination($paginationId,$books,isset($overalBooksAmount)?$overalBooksAmount:0) ?>
                                            </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
