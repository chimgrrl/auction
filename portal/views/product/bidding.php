<?php

use yii\helpers\Html;
use yii\web\View;

$this->title = 'iDeal - ' . $product->product_name;
?>
    <main>
        <section class="sections">
            <div class="container">

                <div class="nav-category"><?= Html::a('Home', '@web') ?> ><a
                        href="#"><?= $product->productCategory->product_category_name ?></a></div>

                <div class="product-container">
                    <div class="row">
                        <div class="col-md-6 col-sm-5">
                            <div data-ride="carousel" class="carousel slide" id="product-carousel">
                                <div class="carousel-list">
                                    <div role="listbox" class="carousel-inner">
                                        <div class="item">
                                            <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                        </div>
                                        <div class="item active">
                                            <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                        </div>
                                        <div class="item">
                                            <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                        </div>
                                    </div>

                                    <a data-slide="prev" role="button" href="#product-carousel"
                                       class="left carousel-control"><i class="fa fa-angle-left"></i><span
                                            class="sr-only">Previous</span></a>
                                    <a data-slide="next" role="button" href="#product-carousel"
                                       class="right carousel-control"><i class="fa fa-angle-right"></i><span
                                            class="sr-only">Next</span></a>
                                </div>
                                <!-- Indicators -->
                                <div class="indicators-wrapper">
                                    <ol class="carousel-indicators">
                                        <li class="" data-slide-to="0"
                                            data-target="#product-carousel"> <?= Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                                        <li data-slide-to="1" data-target="#product-carousel"
                                            class="active"> <?= Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                                        <li data-slide-to="2" data-target="#product-carousel"
                                            class=""> <?= Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-7">
                            <div class="item-name"><?= $product->product_name ?></div>
                            <div class="item-desc"><?= $product->product_desc ?> </div>

                            <div class="item-label"><span>Seller:</span> Fai Wong</div>
                            <div class="item-label"><span>Quantity:</span> 50</div>

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

                                <div class="item-bid-price item-label"><span>Present Bidding Price:</span>$890999</div>
                                <div class="item-bid-amount item-label">
                                    <span>My Bidding Price:</span>
                                    <input type="text" name="bidding"/></div>
                                <br>

                                <!-- Button With Price  -->
                                <div class="fonts0 item-btn">
                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn btn-danger btn-hammer fNumber">
                                            <?= Html::img('@web/img/ui/hammer.png') ?>
                                            <span>BID NOW</span></button>
                                    </div>
                                </div>

                                <div class="item-label">14 / 100 people bought</div>

                                <div class="fonts0 item-btn">
                                    <div class="btn-group">
                                        <div class="item-label">14 / 100 people bought</div>
                                        <button type="button" class="btn btn-default wish-btn"><i
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
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="product-tab-one">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><?php echo $product->product_desc ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>

<?php

$this->registerJsFile('@web/js/jquery.countdown.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/module/product/countdown.css");
$this->registerJs("

$('#getting-started').countdown('" . $product->product_bidding_date . "', function (event) {

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