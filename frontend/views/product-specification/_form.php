<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSpecification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-specification-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'product_specification_name') ?>

    <?= $form->field($model, 'product_specification_tag') ?>

    <?= $form->field($model, 'product_specification_prefix') ?>

    <?= $form->field($model, 'product_specification_value_price') ?>

    <div class="row">
        <div class="control-label col-sm-3">
            <label>Parent Specification</label>
        </div>
        <div class="col-sm-3">

            <?= Html::activeRadioList($model, 'product_specification_parent_id',
                ArrayHelper::map($parentSpecifications, 'product_specification_id', 'product_specification_name'),
                ['class' => 'categoryOptionList']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
