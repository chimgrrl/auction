<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MembershipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'membership_unique_id') ?>

    <?= $form->field($model, 'membership_login_id') ?>

    <?= $form->field($model, 'membership_first_name') ?>

    <?= $form->field($model, 'membership_last_name') ?>

    <?php // echo $form->field($model, 'membership_gender') ?>

    <?php // echo $form->field($model, 'membership_date_of_birth') ?>

    <?php // echo $form->field($model, 'membership_district') ?>

    <?php // echo $form->field($model, 'membership_address') ?>

    <?php // echo $form->field($model, 'membership_contact_telephone') ?>

    <?php // echo $form->field($model, 'membership_email_address') ?>

    <?php // echo $form->field($model, 'membership_current_points') ?>

    <?php // echo $form->field($model, 'membership_current_reputation') ?>

    <?php // echo $form->field($model, 'membership_date_of_joining') ?>

    <?php // echo $form->field($model, 'membership_status') ?>

    <?php // echo $form->field($model, 'membership_profile_image') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
