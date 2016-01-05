<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSpecificationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-specification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'product_specification_id') ?>

    <?= $form->field($model, 'product_specification_name') ?>

    <?= $form->field($model, 'product_specification_tag') ?>

    <?= $form->field($model, 'product_specification_prefix') ?>

    <?php // echo $form->field($model, 'product_specification_value_price') ?>

    <?php // echo $form->field($model, 'product_specification_create_date') ?>

    <?php // echo $form->field($model, 'product_specification_create_user_id') ?>

    <?php // echo $form->field($model, 'product_specification_last_update_date') ?>

    <?php // echo $form->field($model, 'product_specification_last_update_user_id') ?>

    <?php // echo $form->field($model, 'product_specification_status') ?>

    <?php // echo $form->field($model, 'merchant_brand_fk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
