<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\web\View;

$this->title = 'iDeal - ' . $product->product_name;

$this->registerJsFile('@web/js/jquery.countdown.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/module/product.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/module/product/countdown.css");
$this->registerJs("

$('#getting-started').countdown('" . $biddingDate . "', function (event) {

        var seconds = event.strftime('%S');
        var minutes = event.strftime('%M');
        var hours = event.strftime('%H');
        var days = event.strftime('%D');

        $('.seconds-counter > span.first').text(seconds[0]);
        $('.seconds-counter > span.second').text(seconds[1]);

        $('.minutes-counter > span.first').text(minutes[0]);
        $('.minutes-counter > span.second').text(minutes[1]);

        $('.hours-counter > span.first').text(hours[0]);
        $('.hours-counter > span.second').text(hours[1]);

        $('.days-counter > span.first').text(days[0]);
        $('.days-counter > span.second').text(days[1]);
    });

", View::POS_END, 'my-options');
?>
<main>
    <section class="sections">
        <div class="container">

            <div class="nav-category"><?= Html::a('Home', '@web') ?> ><a
                    href="#"><?= $productCategory ?></a></div>

            <div class="product-container">
                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-list">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                    </div>


                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#product-carousel" role="button"
                                   data-slide="prev"><i class="fa fa-angle-left"></i><span
                                        class="sr-only">Previous</span></a>
                                <a class="right carousel-control" href="#product-carousel" role="button"
                                   data-slide="next"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-7">
                        <div class="item-name"><?= $product->product_name ?></div>
                        <div class="item-desc"><?= $product->product_desc ?> </div>

                        <div class="item-ui-a">

                            <div id="getting-started">

                                <div class="item-counter"><!-- DateTime  -->
                                    <div class="text-center fNumber">
                                        <span>Days</span>
                                        <div class="num-counter days-counter">
                                            <span class="first"></span>
                                            <span class="second"></span>
                                        </div>
                                    </div>
                                    <div class="text-center fNumber">
                                        <span>Hours</span>
                                        <div class="num-counter hours-counter">
                                            <span class="first"></span>
                                            <span class="second"></span>
                                        </div>
                                    </div>
                                    <div class="text-center fNumber">
                                        <span>Minutes</span>
                                        <div class="num-counter minutes-counter">
                                            <span class="first"></span>
                                            <span class="second"></span>
                                        </div>
                                    </div>
                                    <div class="text-center fNumber">
                                        <span>Seconds</span>
                                        <div class="num-counter seconds-counter">
                                            <span class="first"></span>
                                            <span class="second"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Button With Price  -->
                            <div class="fonts0 item-btn">
                                <div class="btn-group">
                                    <button type="button"
                                            class="btn btn-danger btn-hammer fNumber"><?= Html::img('@web/img/ui/hammer.png') ?>
                                        <span>bidding $<?= $product->product_price ?></span></button>
                                </div>
                            </div>

                            <div class="item-buycount">999 people bought</div>

                            <div class="fonts0 item-btn">
                                <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-danger cart fTitle"><i class="fa fa-shopping-cart"></i><span>Add to cart</span></button>
                                </div> -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default wishlist fTitle"><i
                                            class="fa fa-heart"></i><span>Add to wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 product-info">
                        <ul id="myTab" class="nav nav-tabs nav_tabs fTitle">
                            <li class="active"><a href="#item-tab-one" data-toggle="tab">Detail</a></li>
                            <li><a href="#item-tab-two" data-toggle="tab">How to Redeem</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="item-tab-one">
                                <div class="item-info">
                                    <!-- Product Info Content -->
                                    <?= $product->product_desc ?> <!-- Product Info Content -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="item-tab-two">
                                <div class="item-info">
                                    <!-- Product Info Content -->
                                    <?= $product->product_desc ?>
                                    <!-- Product Info Content -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>
</main>