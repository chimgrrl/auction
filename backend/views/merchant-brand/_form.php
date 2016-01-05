<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MerchantBrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="merchant-brand-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],
	'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'merchant_brand_id') ?>

    <?= $form->field($model, 'merchant_brand_name1') ?>

    <?= $form->field($model, 'merchant_brand_name2') ?>

    <?= $form->field($model, 'merchant_brand_tag') ?>

    <?= $form->field($model, 'merchant_brand_url') ?>

    <?= $form->field($model, 'merchant_brand_official_url') ?>

    <?= $form->field($model, 'merchant_brand_email')->input('email') ?>

    <?= $form->field($model, 'upload_file1')->fileInput() ?>

    <?= $form->field($model, 'upload_file2')->fileInput() ?>

    <?= $form->field($model, 'merchant_brand_search_keywords') ?>   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
