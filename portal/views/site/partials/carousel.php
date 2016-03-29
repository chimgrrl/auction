<section id="slide-1" class="sections">

    <div id="main-carousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-wrapper">
            <div class="carousel-inner" role="listbox">

                <?php for ($i = 0; $i <= 3; $i++): ?>
                    <div class="item <?php echo ($i<=0) ? 'active' : '';?> ">

                        <?php echo $HTML::img('@web/img/slides/01.jpg') ?>

                        <div class="carousel-caption fonts0">
                            <div class="caption-item fontsn">

                                <div class="item-name text-left">Swarovski Advantage Cuff</div>
                                <div class="item-desc text-left">$841.5 Swarovski Advantage Cuff Links 5037641!
                                    Stainless steel cuff links! Features an eye-catching knot design! With Pure lines
                                    and Jet Hematite crystal pave!
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
                                            <button type="button"
                                                    class="btn btn-danger btn-hammer fNumber"><?php echo $HTML::img('@web/img/ui/hammer.png') ?>
                                                <span>bidding $123,456</span></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people
                                            bought
                                        </div>
                                        <div class="text-center col-md-3  col-xs-3 fontsn"><a><i
                                                    class="fa fa-heart active"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

            </div>

            <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container">
            <div class="indicators-wrapper">
                <ol class="carousel-indicators fonts0">
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

</section>