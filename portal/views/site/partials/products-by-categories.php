<section class="sections category">
    <div class="container">

        <h1 class="category-title"><span>All Categories</span></h1>

        <div class="category-wrap">
            <?php foreach ($categories as $category) : ?>

                <h2 class="category-title category-2"
                    style="background-color:<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>">
                    <?php echo $HTML::img($category->getUploadedFileUrl('product_category_icon')) ?>
                    <span><?php echo $category->product_category_name ?></span>
                    <a>
                        <button type="button" class="btn btn-default  btn-more">more</button>
                    </a>
                </h2>

                <div class="row">

                    <?php foreach ($category->products as $product) : ?>
                        <?php if (empty($product->product_bidding_date)) : ?>

                            <div class="col-lg-3 col-sm-4 product-item cart-type">
                                <?php echo $HTML::a("<div class=\"photo-wrapper\">" . $HTML::img($product->getUploadedFileUrl('product_picture'), ['class' => 'cover-img']) . "</div>", ['product/forsell', 'pid' => $product->product_id]) ?>
                                <div class="item-name"><?php echo $product->product_name ?></div>
                                <div class="item-price">
                                    <span><?php echo $product->product_price ?></span><span><?php echo $product->product_price ?></span>
                                </div>
                                <ul class="item-ui">
                                    <li>999<i class="fa fa-user"></i></li>
                                    <li><i class="fa fa-heart active"></i></li>
                                    <li><i class="fa fa-shopping-cart"></i></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>

            <?php endforeach ?>
        </div>
    </div>
</section>