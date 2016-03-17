<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'iDeal - Registration Agreement';
?>

<main class="main register">
    <section class="sections">
        <div class="container">

            <div class="nav-category"><?= Html::a('Home', '@web') ?> >
                Registration Agreement
            </div>

            <div class="row">
                <h2 class="col-sm-12 col-xs-12 text-center">Terms and Condition</h2>

                <div class="col-sm-12 col-xs-12 gwrap">
                    <p>Welcome to the registration to Telegraph Media Group Limited's ("us", "we") website and its
                        related services. You may access many areas of our website without registering your details with
                        us. Certain areas are only open to you if you register. The terms and conditions which govern
                        material submitted by you to us and your use of the www.telegraph.co.uk website (including all
                        'Telegraph' branded microsites and any email bulletins) are governed by our general "Terms and
                        Conditions of Reading". These Terms and Conditions of Registration are in addition to the
                        general Terms and Conditions of Reading.</p>

                    <h4>registration</h4>

                    <p>By registering here and creating your "Telegraph.co.uk Profile", you can access different
                        services that are offered by us without having to register for each service separately. If a
                        service you wish to subscribe to has additional terms and conditions, you will be asked to
                        accept these separately.</p>

                    <h4>Term</h4>

                    <p>If you breach these or any of our other terms and conditions we reserve the right to close your
                        account, if we do so, we may close all accounts you have open in your name.</p>

                    <p>To deactivate your account please contact our customer services department; their details can be
                        found under "contact us" on your Telegraph.co.uk Profile page.</p>

                    <h4>Administration</h4>

                    <p>You can update your personal details (including your account and marketing preferences) by
                        accessing your account at your Telegraph.co.uk Profile page and making any necessary changes;
                        this will update your details across all services that you have subscribed to.</p>

                    <h4>Data</h4>

                    <p>Full details of the way in which we use cookies on our website and how we hold and process your
                        information can be found in our Privacy and Cookie Policy</p>

                    <h4>General</h4>

                    <p>No waiver by us of any breach of these terms shall constitute a waiver of any other prior or
                        subsequent breach and we shall not be affected by any delay, failure or omission to enforce or
                        express forbearance granted in respect of any of your obligations.</p>

                    <p>The rights and remedies of is under these terms are independent, cumulative and without prejudice
                        to its rights under the law.</p>

                    <p>These terms are not intended to create and shall not create any rights, entitlements, claims or
                        benefits enforceable by any third party by virtue of the Contracts (Rights of Third Parties) Act
                        1999.</p>

                </div>

                <div class="twrap">
                    <div class="col-sm-6 col-xs-12 text-center">
                        <?= Html::a('AGREE', ['/registration/signup',],
                            ['class' => 'btn btn-danger col-sm-7 col-xs-12 fleft']) ?>
                    </div>
                    <div class="col-sm-6 col-xs-12 text-center">
                        <?= Html::a('DISAGREE', ['/site',],
                            ['class' => 'btn btn-default cancel-btn col-sm-7 col-xs-12 fright']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

