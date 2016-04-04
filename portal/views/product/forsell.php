<?php

use yii\helpers\Html;

$this->title = 'iDeal - ' . $product->product_name;
?>
<main class="main product-page">
    <section class="sections">
        <div class="container">

            <div class="nav-category"><?php echo Html::a('Home', '@web') ?> ><a
                    href="#"><?php echo $product->productCategory->product_category_name ?></a></div>

            <div class="row">
                <div class="col-md-6 col-sm-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-list">
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                </div>
                                <div class="item">
                                    <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                </div>
                                <div class="item">
                                    <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?>
                                </div>
                            </div>

                            <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev"><i
                                    class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a>

                            <a class="right carousel-control" href="#product-carousel" role="button"
                               data-slide="next"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
                        </div>

                        <!-- Indicators -->
                        <div class="indicators-wrapper">
                            <ol class="carousel-indicators">
                                <li class="" data-slide-to="0"
                                    data-target="#product-carousel"> <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                                <li data-slide-to="1" data-target="#product-carousel"
                                    class="active"> <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                                <li data-slide-to="2" data-target="#product-carousel"
                                    class=""> <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-7 product-item">
                    <div class="item-name"><?php echo $product->product_name ?></div>
                    <p><?php echo $product->product_desc ?> </p>
                    <div class="item-price"><span>$200,000</span><span>$400,000</span></div>
                    <div class="item-label">14 people bought</div>
                    <div class="item-cart-amount item-label">
                        <span>Quantity:</span>
                        <select>
                            <option>1</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-danger cart-btn"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span>
                    </button>

                    <button type="button" class="btn btn-default wish-btn"><i class="fa fa-heart"></i><span>Add to wishlist</span>
                    </button>

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <ul id="myTab" class="nav nav-tabs nav_tabs fTitle">
                        <li class="active"><a href="#item-tab-one" data-toggle="tab">Detail</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="product-tab-one">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo Html::img($product->getUploadedFileUrl('product_picture')) ?>
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