<section id="slide-3" class="sections">
    <div class="container">

        <h1 class="fTitle category-title">
            <span>All Categories</span>
        </h1>

        <div class="category-list">
            <?php foreach ($categories as $category) : ?>

                <div class="category-item1 category-item">
                    <h2 class="fTitle category-list-title"
                        style="background-color:<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>">
                        <?php echo $HTML::img($category->getUploadedFileUrl('product_category_icon')) ?>
                        <span><?php echo $category->product_category_name ?></span><a>
                            <button type="button" class="btn btn-default fNormal">more</button>
                        </a></h2>

                    <div class="row">

                        <?php foreach ($category->products as $product) : ?>
                            <?php if (!empty($product->product_bidding_date)) : ?>
                                <div class="col-lg-3 col-sm-4 col-xs-6 product-item fontss">
                                    <?php echo $HTML::a("<div class=\"photo-wrapper\">" . $HTML::img($product->getUploadedFileUrl('product_picture'), ['class' => 'cover-img']) . "</div>", ['product/bidding', 'pid' => $product->product_id]) ?>
                                    <div class="item-name fontsn"
                                         title="<?php echo $product->product_name ?>"><?php echo $product->product_name ?></div>
                                    <div class="item-price fonts0"><span
                                            class="item-price1 text-right fontsl"><?php echo $product->product_price ?></span><span
                                            class="item-price2 text-left fontsn"><?php echo $product->product_price ?></span>
                                    </div>
                                    <div class="item-ui-b text-center">
                                        <ul class="text-center fonts0">
                                            <li class="fontsn">999<i class="fa fa-user"></i></li>
                                            <li class="fontsn"><a><i class="fa fa-heart"></i></a></li>
                                            <li class="fontsn"><a><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>