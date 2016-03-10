<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'iDeal';
?>
<main id="home">
	    	<section id="slide-1" class="sections">

	    		<div id="main-carousel" class="carousel slide" data-ride="carousel">
				    
				    <!-- Wrapper for slides -->
				    <div class="carousel-wrapper">
					    <div class="carousel-inner" role="listbox">
					        <div class="item active">
					        	<!-- Slides Image -->
					            <?= Html::img('@web/img/slides/01.jpg') ?>
					            <!-- Slides caption -->
					           	<div class="carousel-caption fonts0">
					           		<div class="caption-item fontsn">
					           			<!-- Slides Content -->
				    					<div class="item-name text-left">Swarovski Advantage Cuff</div>
				    					<div class="item-desc text-left">$841.5 Swarovski Advantage Cuff Links 5037641! Stainless steel cuff links! Features an eye-catching knot design! With Pure lines and Jet Hematite crystal pave! </div>
				    					<div class="item-counter-type item-ui-a">
				    						<div class="row"> <!-- DateTime  -->
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
				    						<div class="row"> <!-- Button With Price  -->
				    							<div class="col-md-12"><button type="button" class="btn btn-danger btn-hammer fNumber"><?= Html::img('@web/img/ui/hammer.png') ?><span>bidding $123,456</span></button></div>
				    						</div>
				    						<div class="row"> <!-- Item Fav / limit info -->
				    							<div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people bought</div>
				    							<div class="text-center col-md-3  col-xs-3 fontsn"><a><i class="fa fa-heart active"></i></a></div>
				    						</div>				
				    					</div>	 
				    					<!-- Slides Content -->
				    				</div>
						    	</div>
						    	<!-- Slides caption -->
					        </div>
					        <div class="item">
                                <!-- Slides Image -->
                                <?= Html::img('@web/img/slides/01.jpg') ?>
                                <!-- Slides caption -->
                                <div class="carousel-caption fonts0">
                                    <div class="caption-item fontsn">
                                        <!-- Slides Content -->
                                        <div class="item-name text-left">ITEM B</div>
                                        <div class="item-desc text-left">$841.5 Swarovski Advantage Cuff Links 5037641! Stainless steel cuff links! Features an eye-catching knot design! With Pure lines and Jet Hematite crystal pave! </div>
                                        <div class="item-counter-type item-ui-a">
                                            <div class="row"> <!-- DateTime  -->
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
                                            <div class="row"> <!-- Button With Price  -->
                                                <div class="col-md-12"><button type="button" class="btn btn-danger btn-hammer fNumber"><?= Html::img('@web/img/ui/hammer.png') ?><span>bidding $123,456</span></button></div>
                                            </div>
                                            <div class="row"> <!-- Item Fav / limit info -->
                                                <div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people bought</div>
                                                <div class="text-center col-md-3  col-xs-3 fontsn"><a><i class="fa fa-heart active"></i></a></div>
                                            </div>              
                                        </div>   
                                        <!-- Slides Content -->
                                    </div>
                                </div>
                                <!-- Slides caption -->
                            </div>
                            <div class="item">
                                <!-- Slides Image -->
                                <?= Html::img('@web/img/slides/01.jpg') ?>
                                <!-- Slides caption -->
                                <div class="carousel-caption fonts0">
                                    <div class="caption-item fontsn">
                                        <!-- Slides Content -->
                                        <div class="item-name text-left">ITEM C</div>
                                        <div class="item-desc text-left">$841.5 Swarovski Advantage Cuff Links 5037641! Stainless steel cuff links! Features an eye-catching knot design! With Pure lines and Jet Hematite crystal pave! </div>
                                        <div class="item-counter-type item-ui-a">
                                            <div class="row"> <!-- DateTime  -->
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
                                            <div class="row"> <!-- Button With Price  -->
                                                <div class="col-md-12"><button type="button" class="btn btn-danger btn-hammer fNumber"><?= Html::img('@web/img/ui/hammer.png') ?><span>bidding $123,456</span></button></div>
                                            </div>
                                            <div class="row"> <!-- Item Fav / limit info -->
                                                <div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people bought</div>
                                                <div class="text-center col-md-3  col-xs-3 fontsn"><a><i class="fa fa-heart active"></i></a></div>
                                            </div>              
                                        </div>   
                                        <!-- Slides Content -->
                                    </div>
                                </div>
                                <!-- Slides caption -->
                            </div> 
					    </div>

					    <!-- Left and right controls -->
					    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a>
					    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
				    </div>
				   
				   
				    <!-- Indicators -->
				    <div class="container">
					    <div class="indicators-wrapper">
						    <ol class="carousel-indicators fonts0">
						        <li data-target="#main-carousel" data-slide-to="0" class="active"><?= Html::img('@web/img/slides/01.jpg') ?></li>
						        <li data-target="#main-carousel" data-slide-to="1"><?= Html::img('@web/img/slides/01.jpg') ?></li>
						        <li data-target="#main-carousel" data-slide-to="2"><?= Html::img('@web/img/slides/01.jpg') ?></li>
						    </ol>
					    </div>
				  	</div>
				</div>



    		</section>

	    	<section id="slide-2" class="sections">
	    		<div class="container">
	    			<div class="row">
	    				<div class="col-sm-9 col-xs-12"><h1 class="fTitle">Recommended for you</h1></div>
	    				<div class="col-sm-3 text-right col-fTitle"><a><button type="button" class="btn btn-default fNormal">more</button></a></div>
	    			</div>
	    			<div class="row">
	    				<?php
						foreach($recProducts as $currRecProduct){
							?>
							<div class="col-lg-4 col-sm-6 product-item fontss">
   <div class="photo-wrapper">
      <!-- item photo  -->
      <?= Html::img($currRecProduct->getUploadedFileUrl('product_picture'),['class' => 'cover-img']) ?>
   </div>
   <div class="item-name fontsn" title="<?= $currRecProduct->product_name?>"><?= $currRecProduct->product_name?></div>
   <div class="item-counter-type item-ui-a">
      <div class="row">
         <!-- DateTime  -->
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
         <!-- Button With Price  -->
         <div class="col-md-12"><button type="button" class="btn btn-danger btn-hammer fNumber"><?= Html::img('@web/img/ui/hammer.png') ?><span>bidding $<?= $currRecProduct->product_price?></span></button></div>
      </div>
      <div class="row">
         <!-- Item Fav / limit info -->
         <div class="item-buycount text-left col-md-9  col-xs-9 fontsn">999/999 people bought</div>
         <div class="text-center col-md-3  col-xs-3 fontsn"><a><i class="fa fa-heart"></i></a></div>
      </div>
   </div>
</div>
						<?php
						}
						?>
	    			</div>
	    		</div>
	    	</section>

	    	<section id="slide-3" class="sections">
	    		<div class="container">
	    			
    				<h1 class="fTitle category-title"><span>All Categories</span></h1>
	    			
	    			<div class="category-list">
	    			<!--category level looping per category section-->
					<?php
						foreach($allCats as $currCat)
						{?>
						<div class="category-item1 category-item">
							<h2 class="fTitle category-list-title" style="background-color:<?=sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>"><?= Html::img($currCat->getUploadedFileUrl('product_category_icon')) ?><span><?= $currCat->product_category_name ?></span><a><button type="button" class="btn btn-default fNormal">more</button></a></h2>

							<div class="row">
							<?php
							$allProducts = array_slice($currCat->products,-4);
							foreach($allProducts as $currProduct)
							{
							?>
							<div class="col-lg-3 col-sm-4 col-xs-6 product-item fontss">
							   <?= Html::a("<div class=\"photo-wrapper\">".Html::img($currProduct->getUploadedFileUrl('product_picture'),['class' => 'cover-img'])."</div>",['site/product','pid'=>$currProduct->product_id]) ?>
							   <div class="item-name fontsn" title="<?= $currProduct->product_name?>"><?= $currProduct->product_name?></div>
							   <div class="item-price fonts0"><span class="item-price1 text-right fontsl"><?= $currProduct->product_price?></span><span class="item-price2 text-left fontsn"><?= $currProduct->product_price?></span></div>
							   <div class="item-ui-b text-center">
								  <ul class="text-center fonts0">
									 <li class="fontsn">999<i class="fa fa-user"></i></li>
									 <li class="fontsn"><a><i class="fa fa-heart"></i></a></li>
									 <li class="fontsn"><a><i class="fa fa-shopping-cart"></i></a></li>
								  </ul>
							   </div>
							</div>
							<?php
							}
							?>
							</div>
						</div>
					<?php	}
					?>
					<!-- end category level looping -->
	    			</div>
	    		</div>
	    	</section>

    	</main>
