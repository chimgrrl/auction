<section id="slide-2" class="sections">
    <div class="container">

        <div class="row">
            <div class="col-sm-9 col-xs-12"><h1 class="fTitle">Recommended for you</h1></div>
            <div class="col-sm-3 text-right col-fTitle">
                <a>
                    <button type="button" class="btn btn-default fNormal">more</button>
                </a>
            </div>
        </div>

        <div class="row">
            <?php foreach ($recommendedProducts as $recommendedProduct) : ?>

                <div class="col-lg-4 col-sm-6 product-item fontss">
                    <div class="photo-wrapper   ">
                        <?php echo $HTML::a("<div class=\"photo-wrapper\">" . $HTML::img($recommendedProduct->getUploadedFileUrl('product_picture'), ['class' => 'cover-img']) . "</div>", ['product/forsell', 'pid' => $recommendedProduct->product_id]) ?>
                    </div>
                    <div class="item-name fontsn" title="<?php echo $recommendedProduct->product_name ?>">
                        <?php echo $recommendedProduct->product_name ?>
                    </div>
                    <div class="item-counter-type item-ui-a">
                        <div class="row">
                            <div class="col-md-3 col-xs-3 text-center fNumber">
                                <span>Days</span>
                                <div class="num-counter"><span>0</span><span>1</span></div>
                            </div>
                            <div class="col-md-3 col-xs-3 text-center fNumber">
                                <span>Hours</span>
                                <div class="num-counter"><span>2</span><span>3</span></div>
                            </div>
                            <div class="col-md-3 col-xs-3 text-center fNumber">
                                <span>Minutes</span>
                                <div class="num-counter"><span>4</span><span>5</span></div>
                            </div>
                            <div class="col-md-3 col-xs-3 text-center fNumber">
                                <span>Seconds</span>
                                <div class="num-counter"><span>6</span><span>7</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger btn-hammer fNumber">
                                    <?php echo $HTML::img('@web/img/ui/hammer.png') ?>
                                    <span>bidding $<?php echo $recommendedProduct->product_price ?></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people bought
                            </div>
                            <div class="text-center col-md-3  col-xs-3 fontsn"><a><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>