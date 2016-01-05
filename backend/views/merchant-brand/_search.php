<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MerchantBrandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="merchant-brand-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'merchant_brand_id') ?>

    <?= $form->field($model, 'merchant_brand_name1') ?>

    <?= $form->field($model, 'merchant_brand_name2') ?>

    <?= $form->field($model, 'merchant_brand_tag') ?>

    <?php // echo $form->field($model, 'merchant_brand_url') ?>

    <?php // echo $form->field($model, 'merchant_brand_official_url') ?>

    <?php // echo $form->field($model, 'merchant_brand_email') ?>

    <?php // echo $form->field($model, 'merchant_brand_logo_img') ?>

    <?php // echo $form->field($model, 'merchant_brand_logo_img_mobile') ?>

    <?php // echo $form->field($model, 'merchant_brand_search_keywords') ?>

    <?php // echo $form->field($model, 'merchant_brand_create_date') ?>

    <?php // echo $form->field($model, 'merchant_brand_create_user_id') ?>

    <?php // echo $form->field($model, 'merchant_brand_last_update_date') ?>

    <?php // echo $form->field($model, 'merchant_brand_last_update_user_id') ?>

    <?php // echo $form->field($model, 'merchant_brand_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
