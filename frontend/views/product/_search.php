<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_model_number') ?>

    <?= $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_unit_weight') ?>

    <?php // echo $form->field($model, 'product_unit') ?>

    <?php // echo $form->field($model, 'product_origin') ?>

    <?php // echo $form->field($model, 'product_manufacturer') ?>

    <?php // echo $form->field($model, 'product_available_date') ?>

    <?php // echo $form->field($model, 'product_quantity') ?>

    <?php // echo $form->field($model, 'product_ordered') ?>

    <?php // echo $form->field($model, 'product_create_date') ?>

    <?php // echo $form->field($model, 'product_create_user_id') ?>

    <?php // echo $form->field($model, 'product_last_update_date') ?>

    <?php // echo $form->field($model, 'product_last_update_user_id') ?>

    <?php // echo $form->field($model, 'product_status') ?>

    <?php // echo $form->field($model, 'product_category_fk') ?>

    <?php // echo $form->field($model, 'product_specification_fk') ?>

    <?php // echo $form->field($model, 'merchant_brand_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
