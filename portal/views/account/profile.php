<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Account';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main personal">
    <section class="sections">
        <div class="container">

            <div class="row"><div class="col-sm-12 nav-position"><a href="index.html">Home</a>&gt;<a href="#">My Account</a></div></div>

            <div class="row">
                <h2 class="col-sm-12 text-center">My Account</h2>
            </div>
            <div class="row">
                <ul class="nav nav-tabs col-md-3 personal-menu">
                    <li class="active"><a data-toggle="tab" href="#my-profile">My Profile</a></li>
                    <li><a data-toggle="tab" href="#bid-menu">Bid History</a></li>
                    <li><a data-toggle="tab" href="#order-menu">Order History</a></li>
                    <li><a data-toggle="tab" href="#credit-menu">Add Credit History</a></li>
                </ul>
                <div class="tab-content col-md-9 personal-content">
                    <div id="my-profile" class="tab-pane fade in active">
                        <h3>My Profile</h3>
                        <div class="my-profile-wrap">
                            <div><span>Username:</span><span><?php echo $user->username;?></span></div>
                            <div><span>First Name:</span><span><?php echo $member->membership_first_name;?></span></div>
                            <div><span>Surname:</span><span><?php echo $member->membership_last_name;?></span></div>
                            <div><span>Email:</span><span><?php echo $user->email;?></span></div>
                            <div><span>Mobile Phone Number:</span><span><?php echo $member->membership_contact_telephone;?></span></div>
                            <div><span>Date of Birth:</span><span><?php echo $member->membership_date_of_birth;?></span></div>
                            <div><span>Address:</span><span><?php echo $member->membership_address;?></span></div>
                            <div><span>Registration Date:</span><span><?php echo $member->membership_create_date;?></span></div>
                        </div>
                        <a href="#" class="my-profile-edit">EDIT</a>

                    </div>

                    <div id="bid-menu" class="tab-pane fade">
                        <h3>Bid History</h3>
                        <ul class="nav nav-tabs col-sm-12 history-menu">
                            <li class="active col-sm-4 col-xs-4 bid-menu-1"><a data-toggle="tab" href="#bid-process">Processing</a></li>
                            <li class="col-sm-4 col-xs-4 bid-menu-2"><a data-toggle="tab" href="#bid-success">Success</a></li>
                            <li class="col-sm-4 col-xs-4 bid-menu-3"><a data-toggle="tab" href="#bid-history">History</a></li>
                        </ul>
                        <div class="bid-history-wrap">

                            <div class="tab-content col-sm-9 history-content">
                                <div id="bid-process" class="tab-pane fade in active">
                                    <div class="col-sm-6 product-item">
                                        <div class="wwrap">
                                            <img src="/img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="rwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Last bidding price: $290</li>
                                                <li>Present bidding price: $310</li>
                                            </ul>
                                            <ul class="num-counter clearfix">
                                                <li><span>Days</span><span>0</span><span>1</span></li>
                                                <li><span>Hours</span><span>2</span><span>3</span></li>
                                                <li><span>Minutes</span><span>4</span><span>5</span></li>
                                                <li><span>Seconds</span><span>6</span><span>7</span></li>
                                            </ul>
                                            <button class="btn btn-danger btn-hammer" type="button"><img src="img/ui/hammer.png"><span>Bid now</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 product-item">
                                        <div class="wwrap">
                                            <img src="img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="rwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Last bidding price: $290</li>
                                                <li>Present bidding price: $310</li>
                                            </ul>
                                            <ul class="num-counter clearfix">
                                                <li><span>Days</span><span>0</span><span>1</span></li>
                                                <li><span>Hours</span><span>2</span><span>3</span></li>
                                                <li><span>Minutes</span><span>4</span><span>5</span></li>
                                                <li><span>Seconds</span><span>6</span><span>7</span></li>
                                            </ul>
                                            <button class="btn btn-danger btn-hammer" type="button"><img src="img/ui/hammer.png"><span>Bid now</span></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 product-item">
                                        <div class="wwrap">
                                            <img src="img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="rwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Last bidding price: $290</li>
                                                <li>Present bidding price: $310</li>
                                            </ul>
                                            <ul class="num-counter clearfix">
                                                <li><span>Days</span><span>0</span><span>1</span></li>
                                                <li><span>Hours</span><span>2</span><span>3</span></li>
                                                <li><span>Minutes</span><span>4</span><span>5</span></li>
                                                <li><span>Seconds</span><span>6</span><span>7</span></li>
                                            </ul>
                                            <button class="btn btn-danger btn-hammer" type="button"><img src="img/ui/hammer.png"><span>Bid now</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="bid-success" class="tab-pane fade">
                                    <div class="col-sm-6 product-item ">
                                        <div class="wwrap">
                                            <img src="img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="gwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Transaction price: $290</li>
                                            </ul>
                                            <button class="btn btn-default">View Product</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 product-item ">
                                        <div class="wwrap">
                                            <img src="img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="gwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Transaction price: $290</li>
                                            </ul>
                                            <button class="btn btn-default">View Product</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 product-item ">
                                        <div class="wwrap">
                                            <img src="img/product/01.png">
                                            <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                            <ul class="gwrap">
                                                <li>Last bidding time<br>14:25, 20/10/2016</li>
                                                <li>Transaction price: $290</li>
                                            </ul>
                                            <button class="btn btn-default">View Product</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="bid-history" class="tab-pane fade">
                                    <p class="h4 col-sm-12">Successful Deal</p>
                                    <div class="clearfix">
                                        <div class="col-sm-4 product-item ">
                                            <div class="wwrap">
                                                <img src="img/product/01.png">
                                                <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                                <button class="btn btn-default">View Product</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="h4 col-sm-12">Fail Deal</p>
                                    <div class="clearfix">
                                        <div class="col-sm-4 product-item ">
                                            <div class="wwrap">
                                                <img src="img/product/01.png">
                                                <div class="item-name">Swarovski Body Strandage Gold-tone Necklace</div>
                                                <button class="btn btn-default">View Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="order-menu" class="tab-pane fade">
                        <h3>Order History</h3>

                        <div aria-multiselectable="true" role="tablist" id="js-process-accordion" class="panel-group process-accordion">
                            <div class="panel panel-default">
                                <div aria-controls="js-process-body-1" aria-expanded="true" href="#js-process-body-1" data-parent="#js-process-accordion" data-toggle="collapse" id="js-process-head-1" role="tab" class="panel-heading">
                                    <div>14:25, 20/10/2016</div>
                                    <div><span class="fleft"># 928272</span><span class="fright">Processing <span class="caret"></span></span></div>

                                </div>
                                <div aria-labelledby="js-process-head-1" role="tabpanel" class="panel-collapse collapse in" id="js-process-body-1">
                                    <div class="panel-body">
                                        <ul class="product-list">
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1 Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 123</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 999</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 1</span>
                                            </li>
                                        </ul>
                                        <div class="product-list-total"><span>Total:</span><span>$ 290,000,000</span></div>
                                        <div class="product-list-addr">
                                            <div>Bee Bee Chiu</div>
                                            <div>6678 9876</div>
                                            <div>Flat A3B, 6th Floor, Block A, Mai Hing I</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div aria-controls="js-process-body-2" aria-expanded="false" href="#js-process-body-2" data-parent="#js-process-accordion" data-toggle="collapse" id="js-process-head-2" role="tab" class="panel-heading">
                                    <div>14:25, 19/10/2016</div>
                                    <div><span class="fleft"># 928271</span><span class="fright">Processing <span class="caret"></span></span></div>
                                </div>
                                <div aria-labelledby="js-process-head-2" role="tabpanel" class="panel-collapse collapse" id="js-process-body-2">
                                    <div class="panel-body">
                                        <ul class="product-list">
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1 Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 123</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 999</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 1</span>
                                            </li>
                                        </ul>
                                        <div class="product-list-total"><span>Total:</span><span>$ 290,000,000</span></div>
                                        <div class="product-list-addr">
                                            <div>Bee Bee Chiu</div>
                                            <div>6678 9876</div>
                                            <div>Flat A3B, 6th Floor, Block A, Mai Hing I</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div aria-multiselectable="true" role="tablist" id="js-complete-accordion" class="panel-group complete-accordion">
                            <div class="panel panel-default">
                                <div aria-controls="js-complete-body-1" aria-expanded="true" href="#js-complete-body-1" data-parent="#js-complete-accordion" data-toggle="collapse" id="js-complete-head-1" role="tab" class="panel-heading">
                                    <div>14:25, 18/10/2016</div>
                                    <div><span class="fleft"># 928270</span><span class="fright">Success <span class="caret"></span></span></div>
                                </div>
                                <div aria-labelledby="js-complete-head-1" role="tabpanel" class="panel-collapse collapse in" id="js-complete-body-1">
                                    <div class="panel-body">
                                        <ul class="product-list">
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1 Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 123</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 999</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 1</span>
                                            </li>
                                        </ul>
                                        <div class="product-list-total"><span>Total:</span><span>$ 290,000,000</span></div>
                                        <div class="product-list-addr">
                                            <div>Bee Bee Chiu</div>
                                            <div>6678 9876</div>
                                            <div>Flat A3B, 6th Floor, Block A, Mai Hing I</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div aria-controls="js-complete-body-2" aria-expanded="true" href="#js-complete-body-2" data-parent="#js-complete-accordion" data-toggle="collapse" id="js-complete-head-2" role="tab" class="panel-heading">
                                    <div>14:25, 17/10/2016</div>
                                    <div><span class="fleft"># 928269</span><span class="fright">Success <span class="caret"></span></span></div>
                                </div>
                                <div aria-labelledby="js-complete-head-2" role="tabpanel" class="panel-collapse collapse" id="js-complete-body-2">
                                    <div class="panel-body">
                                        <ul class="product-list">
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1 Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 123</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 999</span>
                                            </li>
                                            <li>
                                                <img src="img/product/02.png">
                                                <span>Paul Smith Damson Signature Stripe Circular - 1</span>
                                                <span>$ 290,000 x 1</span>
                                            </li>
                                        </ul>
                                        <div class="product-list-total"><span>Total:</span><span>$ 290,000,000</span></div>
                                        <div class="product-list-addr">
                                            <div>Bee Bee Chiu</div>
                                            <div>6678 9876</div>
                                            <div>Flat A3B, 6th Floor, Block A, Mai Hing I</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="credit-menu" class="tab-pane fade">
                        <h3>Add Credit History</h3>
                    </div>
                </div>


            </div>
        </div>


    </section>
</main>