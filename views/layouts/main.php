<?php

include_once   \Yii::$app->basePath."\Servises\AccountSessionService.php";

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><?= Html::img('@web/img/core-img/logo.png', ['alt' => 'Logo']); ?> </a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Sci pop</li>
                                        <li><a href="/shop">Selfish Gene</a></li>
                                        <li><a href="/shop">Universe from Nothing</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Fiction</li>
                                        <li><a href="/shop">Der Process</a></li>
                                        <li><a href="/shop">Methamorphosis</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Technique</li>
                                        <li><a href="/shop">.Net Pro</a></li>
                                        <li><a href="/shop">Alrgorithms pt.1</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <?= Html::img('@web/img/bg-img/bg-6.jpg', ['alt' => 'Bg6']); ?>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="/home">Home</a></li>
                                    <li><a href="/shop">Shop</a></li>
                                    <li><a href="/order">Checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="/home/contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="/shop/search" method="get">
                        <input type="search" name="searchString" id="searchString" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><?= Html::img('@web/img/core-img/bag.svg', ['alt' => 'Bag6']); ?>
                        <span class="cartIcon"><?php $session = Yii::$app->session;
                            echo count($session['cartItems']) ?></span></a>
                </div>
            </div>

        </div>
    </header>

    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><?= Html::img('@web/img/core-img/bag.svg', ['alt' => 'Bag']); ?><span
                        class="cartIcon"><?php $session = Yii::$app->session;
                    echo count($session['cartItems']) ?></span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->

                <?php

                $myarr =  getCartItems();

                $total = 0;
                if (count($myarr) > 0 && isset($myarr)) {

                    foreach ($myarr as $name => $value) {
                        echo "<div class=\"single-cart-item $value->ItemId\">
                             <a href=\"#\" class=\"product-image\">";

                        echo Html::img('@web/' . $value->Image, ['alt' => '$value->Image']);

                        echo " <img src=\"\" class=\"cart-thumb\" alt=\"\">
                                 <!-- Cart Item Desc -->
                                 <div class=\"cart-item-desc\">
                                     <input class='Id' type='hidden' value='$value->ItemId'>
                                     <span class=\"product-remove\"><i class=\"fa fa-close\" aria-hidden=\"true\"></i></span>
                                     <span class=\"badge\">$value->Author</span>
                                     <h6>$value->Title</h6>
                                     <p class=\"price\">$value->Price</p>
                                 </div>
                     </a>
                 </div> ";

                        $total += $value->Price;
                    }
                }
                ?>

            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$<?= $total ?></span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-0%</span></li>
                    <li><span>total:</span> <span>$<?= $total ?></span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="/order" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>


    <?= $content ?>

</div>

<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <?= Html::img('@web/img/core-img/logo2.png', ['alt' => 'FLogo']); ?>
                    </div>
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/home/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Shipping and Delivery</a></li>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Subscribe</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="mail" placeholder="Your email here">
                            <button type="submit" class="submit"><i class="fa fa-long-arrow-right"
                                                                    aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"
                                                                                                  aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                    class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                    class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>

    </div>


</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
