<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'product_category_id') ?>

    <?= $form->field($model, 'product_category_parent_id') ?>

    <?= $form->field($model, 'product_category_name') ?>

    <?= $form->field($model, 'product_category_tag') ?>

    <?php // echo $form->field($model, 'product_category_keywords') ?>

    <?php // echo $form->field($model, 'product_category_icon') ?>

    <?php // echo $form->field($model, 'product_category_icon_mobile') ?>

    <?php // echo $form->field($model, 'product_category_create_date') ?>

    <?php // echo $form->field($model, 'product_category_create_user_id') ?>

    <?php // echo $form->field($model, 'product_category_last_update_date') ?>

    <?php // echo $form->field($model, 'product_category_last_update_user_id') ?>

    <?php // echo $form->field($model, 'product_category_status') ?>

    <?php // echo $form->field($model, 'merchant_brand_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
