<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use portal\assets\AppAsset;
use common\widgets\Alert;
use kartik\icons\Icon;

AppAsset::register($this);

$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modernizr-2.7.1.min.js',['position'=>View::POS_HEAD]);
$this->registerCssFile("@web/css/normalize.css");
$this->registerCssFile("@web/css/main.css");
Icon::map($this, Icon::FA);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="loading">
<?php $this->beginBody() ?>
<div id="preload"> </div>

<div id="header">
        	<!-- user Login / Cart / contact / fb Like -->
	        <div class="navUser">
	        	<div class="container">
		        	<div class="row">
		        		<div class="collapse navbar-collapse" id="collapse-userui">
		        			<ul class="nav navbar-nav navbar-left">
		        				<li><a href="#"><i class="fa fa-user"></i>Login</a></li>
								<li><a href="site/signup"><i class="fa fa-bolt"></i>Signup</a></li>
		        				<li><a href="#"><i class="fa fa-shopping-cart"></i>Shopping Cart</a></li>
		        				<li class="dropdown">
		        					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>ENG</a>
		        					<ul class="dropdown-menu">
		        						<li><a href="#">ZH-HK</a></li>
		        						<!-- <li><a href="#">ENG</a></li> -->
		        					</ul>
		        				</li>
		        			</ul>
		        			<ul class="nav navbar-nav navbar-right">
		        				<li><a href="#"><?= Html::img('@web/img/ui/fb_share.png') ?></a></li>
		        				<li><a href="#"><?= Icon::show('mobile')?>+852 21523988</a></li>
		        				<li><a href="#"><?= Icon::show('envelope')?>Email Us</a></li>
		        			</ul>
		        		</div>
					</div>
	        	</div>
	        </div>
	        <!-- End -->
	        <!-- Logo / Search  -->
	        <div class="navSearch">
	        	<div class="container">
	        		<div class="row">
	        			<nav class="navbar navbar-left">
	        				<div class="navbar-header">
			<?= Html::a(Html::img('@web/img/logo.png'),'@web',['class'=>'navbar-brand']) ?>	
	        					
	        				</div>	
	        			</nav>
	        			<form class="navbar-form navbar-right collapse navbar-collapse" id="collapse-search" role="search">
	        				<div class="form-group">
	        					<input type="text" class="form-control" placeholder="Search">
	        					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	        				</div>
	        			</form>
	        		</div>
	        	</div>
	        </div>
	        <!-- End -->
	        <!-- Main Menu / Category  -->
	        <div class="navMenu text-center">
	        	<div class="container">
	        		<div class="row clearfix fonts0">
        				<div class="main-nav collapse navbar-collapse" id="collapse-mainmenu">
        					<ul class="nav navbar-nav fontsn">
        						<li><a href="#">Home</a></li>
        						<li><a href="#">Flash Sales</a></li>
        						<li><a href="#">New Arrivals</a></li>
        						<li><a href="#">Best Sellers</a></li>
        						<li class="dropdown">
	        						<button href="#" class="dropdown-toggle btn btn-danger" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Categories<span class="caret"></span></button>
	    							<ul class="dropdown-menu">
	    								<li><a href="#">Fashion</a></li>
			        					<li><a href="#">Beauty</a></li>
			        					<li><a href="#">Baby &amp; Maternity</a></li>
			        					<li><a href="#">Fashion</a></li>
			        					<li><a href="#">Kitchen &amp; Living</a></li>
			        					<li><a href="#">Furniture &amp; Home Decor</a></li>
			        					<li><a href="#">Health &amp; Diet</a></li>
			        					<li><a href="#">Sport &amp; Leisure</a></li>
			        					<li><a href="#">Dining</a></li>
			        					<li><a href="#">Travel</a></li>
			        					<li><a href="#">Electronics &amp; Appliance</a></li>
			        					<li><a href="#">Beauty Services</a></li>
			        					<li><a href="#">Activities</a></li>
	    							</ul>
        						</li>
        					</ul>
        				</div>
	        		</div>
	        		
	        	</div>
	        </div>
	        <!-- End -->
	        <div class="nav-btn">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-mainmenu" aria-expanded="false">
			        <i class="fa fa-bars fontsl"></i>
			    </button>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-search" aria-expanded="false">
					<i class="fa fa-search fontsl"></i>
				</button>
			
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-userui" aria-expanded="false">
					<i class="fa fa-cog fontsl"></i>
			    </button>
			</div>
        </div>

<?= $content ?>

<div id="footer">
    		<div class="container">
    			<div class="row">
    				<div class="col-xs-12 col-md-12 text-center h6">© 2015 iDeal. All Rights Reserved.</div>
    			</div>
    		</div>
    	</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
