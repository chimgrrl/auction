<section class="sections recommend">
    <div class="container">

        <div class="row">
            <div class="col-sm-9 col-xs-12"><h1>Recommended for you</h1></div>
            <div class="col-sm-3 text-right col-full-title"><a><button type="button" class="btn btn-default">more</button></a></div>
        </div>

        <div class="row">
            <?php foreach ($recommendedProducts as $recommendedProduct) : ?>


                <div class="col-lg-4 col-sm-6 product-item bid-type">
                    <?php echo $HTML::a("<div class=\"photo-wrapper\">" . $HTML::img($recommendedProduct->getUploadedFileUrl('product_picture'), ['class' => 'cover-img']) . "</div>", ['product/bidding', 'pid' => $recommendedProduct->product_id]) ?>
                    <div class="item-name"><?php echo $recommendedProduct->product_name ?></div>
                    <div class="item-bwrap">
                        <ul class="num-counter clearfix">
                            <li><span>Days</span><span>0</span><span>1</span></li>
                            <li><span>Hours</span><span>2</span><span>3</span></li>
                            <li><span>Minutes</span><span>4</span><span>5</span></li>
                            <li><span>Seconds</span><span>6</span><span>7</span></li>
                        </ul>
                        <div class="item-bid-price"><span>Present Bidding Price:</span>$890999</div>
                        <button type="button" class="btn btn-danger btn-hammer">
                            <?php echo $HTML::img('@web/img/ui/hammer.png') ?>
                            <span>Bid now</span>
                        </button>
                        <ul class="item-ui">
                            <li>999/999 people bought</li>
                            <li><i class="fa fa-heart active"></i></li>
                        </ul>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</section>