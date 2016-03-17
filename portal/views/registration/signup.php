<?php

/* @var $this yii\web\View */
use kartik\widgets\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\View;

$this->title = 'iDeal - Signup';

$this->registerJs("
$('document').ready(function(){
    $('.reset-button').click(function(){
            $('.signUpForm').trigger('reset');
    });
});

", View::POS_END, 'my-options');
?>
<main class="main register">
    <section class="sections">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 nav-position"><a href="index.html">Home</a>><a href="#">Registration</a></div>
            </div>

            <div class="row">
                <h2 class="col-sm-12 col-xs-12 text-center">Registration</h2>

                <?php $form = ActiveForm::begin(['options' => ['class' => 'signUpForm']]); ?>
                <div class="col-sm-12 col-xs-12 gwrap">
                    <div>
                        <p>* Must be Filled</p>

                        <?= $form->field($signUp, 'username')->textInput(['placeholder' => '*Username'])->label(false) ?>

                        <?= $form->field($signUp,
                            'membership_first_name')->textInput(['placeholder' => 'First Name'])->label(false) ?>

                        <?= $form->field($signUp,
                            'membership_last_name')->textInput(['placeholder' => 'Last Name'])->label(false) ?>

                        <?= $form->field($signUp,
                            'password')->passwordInput(['placeholder' => '*Password'])->label(false) ?>

                        <?= $form->field($signUp,
                            'password_confirmation')->passwordInput(['placeholder' => '*Re-enter Password'])->label(false) ?>

                        <?= $form->field($signUp, 'email')->textInput(['placeholder' => '*Email'])->label(false) ?>

                        <?= $form->field($signUp,
                            'membership_contact_telephone')->textInput(['placeholder' => '*Mobile Phone Number'])->label(false) ?>

                        <?= $form->field($signUp,
                            'membership_address')->textInput(['placeholder' => '*Address'])->label(false) ?>

                        <?= $form->field($signUp, 'membership_date_of_birth')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => 'Date of Birth'],
                            'pluginOptions' => [
                                'format' => 'm/d/yyyy',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'clearBtn' => false
                            ]
                        ])->label(false) ?>

                        <div class="form-group field-membership-membership_address">
                            <p>Product you might be interested in</p>

                            <?php foreach ($productCategories as $productCategory): ?>
                                <label class="c-input c-checkbox checkbox-inline">
                                    <input type="checkbox" name="SignupForm[interested_product_categories_fk][]"
                                           value="<?= $productCategory->product_category_id ?>">
                                    <span class="c-indicator"><?= $productCategory->product_category_name ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <?= $form->field($signUp, 'captcha')->widget(Captcha::className())->label(false) ?>

                    </div>
                </div>

                <div class="twrap">
                    <div class="col-sm-6 col-xs-12 text-center">
                        <button class="btn btn-danger col-sm-7 col-xs-12 fleft">SUBMIT</button>
                    </div>
                    <div class="col-sm-6 col-xs-12 text-center">
                        <input type="button" value="RESET"
                               class="btn btn-default cancel-btn col-sm-7 col-xs-12 fright reset-button">
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>


    </section>
</main>