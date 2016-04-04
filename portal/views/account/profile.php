<?php

use yii\helpers\Html;

$this->title = 'My Account';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main personal">
    <section class="sections">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 nav-position"><?= Html::a('Home', '@web') ?> > <a href="#">My Account</a></div>
            </div>

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
                    <div class="tab-pane fade in active" id="my-profile">
                        <h3>My Profile</h3>
                        <?php echo $this->render('partials/profile', ['user' => $user, 'member' => $member]); ?>
                        <a href="#" class="my-profile-edit">EDIT</a>
                    </div>

                    <div class="tab-pane fade" id="bid-menu">
                        <h3>Bid History</h3>
                        <?php echo $this->render('partials/bid_history'); ?>
                    </div>

                    <div id="order-menu" class="tab-pane fade">
                        <h3>Order History</h3>
                        <?php echo $this->render('partials/order_history'); ?>
                    </div>

                    <div class="tab-pane fade" id="credit-menu">
                        <h3>Add Credit History</h3>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>