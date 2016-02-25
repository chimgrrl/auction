<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSpecification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-specification-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'product_specification_id') ?>

    <?= $form->field($model, 'product_specification_name') ?>

    <?= $form->field($model, 'product_specification_tag') ?>

    <?= $form->field($model, 'product_specification_prefix') ?>

    <?= $form->field($model, 'product_specification_value_price') ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
