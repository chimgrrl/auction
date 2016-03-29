<section class="sections">
    <div id="main-carousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-wrap">
            <div class="carousel-inner" role="listbox">

                <?php for ($i = 0; $i <= 3; $i++): ?>

                    <div class="item <?php echo ($i <= 0) ? 'active' : ''; ?> ">
                        <?php echo $HTML::img('@web/img/slides/01.jpg') ?>
                        <div class="carousel-caption">
                            <div class="caption-item">
                                <div class="product-item bid-type">
                                    <div class="item-name">Swarovski Advantage Cuff</div>
                                    <p>$841.5 Swarovski Advantage Cuff Links 5037641! Stainless steel cuff links!
                                        Features an eye-catching knot design! With Pure lines and Jet Hematite crystal
                                        pave!</p>
                                    <ul class="num-counter clearfix">
                                        <li><span>Days</span><span>0</span><span>1</span></li>
                                        <li><span>Hours</span><span>2</span><span>3</span></li>
                                        <li><span>Minutes</span><span>4</span><span>5</span></li>
                                        <li><span>Seconds</span><span>6</span><span>7</span></li>
                                    </ul>
                                    <div class="item-bid-price">Present Bidding Price: $890</div>
                                    <button type="button" class="btn btn-danger btn-hammer"><img
                                            src="img/ui/hammer.png"><span>Bid now</span></button>
                                    <ul class="item-ui">
                                        <li>999/999 people bought</li>
                                        <li><i class="fa fa-heart active"></i></li>
                                    </ul>
                                </div>
                                <!-- Slides Content -->
                            </div>
                        </div>

                    </div>
                <?php endfor; ?>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev"><i
                        class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a>
                <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next"><i
                        class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
            </div>


            <div class="container">
                <div class="indicators-wrapper">
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active">
                            <?php echo $HTML::img('@web/img/slides/01.jpg') ?>
                        </li>
                        <li data-target="#main-carousel" data-slide-to="1">
                            <?php echo $HTML::img('@web/img/slides/01.jpg') ?>
                        </li>
                        <li data-target="#main-carousel" data-slide-to="2">
                            <?php echo $HTML::img('@web/img/slides/01.jpg') ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>