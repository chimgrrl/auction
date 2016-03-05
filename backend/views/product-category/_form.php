<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'product_category_name') ?>

    <?= $form->field($model, 'product_category_tag') ?>

    <?= $form->field($model, 'product_category_keywords') ?>

    <?= $form->field($model, 'product_category_icon')->fileInput() ?>

    <?= $form->field($model, 'product_category_icon_mobile')->fileInput() ?>

    <div class="row">
        <div class="control-label col-sm-3">
            <label>Parent category</label>
        </div>
        <div class="col-sm-3">

            <?= Html::activeRadioList($model, 'product_category_parent_id',
                ArrayHelper::map($parentCategories, 'product_category_id', 'product_category_name'),
                ['class' => 'categoryOptionList']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
