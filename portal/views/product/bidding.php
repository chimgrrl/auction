<?php

use yii\helpers\Html;
use yii\web\View;

$this->title = 'iDeal - ' . $product->product_name;
?>
    <main class="main product-page">
        <section class="sections">
            <div class="container">

                <div class="nav-category"><?= Html::a('Home', '@web') ?> ><a
                        href="#"><?= $product->productCategory->product_category_name ?></a></div>

                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-list">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                    </div>
                                    <div class="item">
                                        <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                    </div>
                                    <div class="item">
                                        <?= Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                    </div>
                                </div>

                                <a class="left carousel-control" href="#product-carousel" role="button"
                                   data-slide="prev"><i class="fa fa-angle-left"></i><span
                                        class="sr-only">Previous</span></a>
                                <a class="right carousel-control" href="#product-carousel" role="button"
                                   data-slide="next"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
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

                    <div class="col-md-6 col-sm-7 product-item">
                        <div class="item-name"><?= $product->product_name ?></div>
                        <p><?= $product->product_desc ?> </p>

                        <div class="item-label"><span>Seller:</span> Fai Wong</div>
                        <div class="item-label"><span>Quantity:</span> 50</div>

                        <div id="getting-started">
                            <div class="item-counter">

                                <ul class="num-counter clearfix">
                                    <li class="days-counter">
                                        <span>Days</span>
                                        <span class="first">0</span>
                                        <span class="second">0</span>
                                    </li>

                                    <li class="hours-counter">
                                        <span>Hours</span>
                                        <span class="first">0</span>
                                        <span class="second">0</span>
                                    </li>

                                    <li class="minutes-counter">
                                        <span>Minutes</span>
                                        <span class="first">0</span>
                                        <span class="second">0</span>
                                    </li>

                                    <li class="seconds-counter">
                                        <span>Seconds</span>
                                        <span class="first"></span>
                                        <span class="second"></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="item-bid-price item-label">
                            <span>Present Bidding Price:</span>
                            $<?php echo $product->product_bidding_price ?>
                        </div>
                        <div class="item-bid-amount item-label"><span>My Bidding Price:</span><input type="text"/></div>

                        <button type="button" class="btn btn-danger btn-hammer" id="bidNow">
                            <?php echo Html::img('@web/img/ui/hammer.png') ?>
                            <span>Bid now</span>
                        </button>
                        <div class="item-label">14 / 100 people bought</div>
                        <button type="button" class="btn btn-default wish-btn"><i class="fa fa-heart"></i><span>Add to wishlist</span>
                        </button>

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
        </section>
    </main>

    <div class="modal fade product-page-modal" id="credit-modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!-- <div class="modal-header">

                </div> -->
                <div class="modal-body">
                    <a class="close" data-dismiss="modal">×</a>
                    <p class="h4">You do not have enough ecoins.Would you like to purchase some?</p>
                    <p>Please update within 3 days after your bidding accepted. Otherwise, your purchase will be
                        cancelled.</p>
                    <button href="#" class="btn btn-primary btn-danger">Add Credit</button>
                </div>

            </div>
        </div>
    </div>

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

        $('.days-counter > span.first').text(days[1]);
        $('.days-counter > span.second').text(days[2]);
    });
    
    $('#bidNow').click(function(){
   
       var data = {myBiddingPrice:500,productId:'fnW3z1JS2z'};
       
        $.post('$bidUrl', data, function(result) {
            if(result=='false'){
               $('#credit-modal').modal('show');
            }
            
            if(result=='true'){
                alert('successfully bid');
            }
        });
                
    });

", View::POS_END, 'my-options');
?>