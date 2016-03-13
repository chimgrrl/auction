<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('@web/js/jquery.highCheckTree.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/highCheckTree.css");

$catNumStr = "data: {productId:'" . $model->product_id . "'}";

$chkbxTreeJs = "
	var catData = [];
	$(function(){
		$.ajax({
			url: '../product-category/get-category-tree',
			{$catNumStr}
		}).done(function(data){
			catData = jQuery.extend(true, [], data);
		});

		$(document).ajaxSuccess(function(event, xhr, settings){
			if(jQuery.isEmptyObject(catData) == false)
			{
				setupTree();
			}else{
				console.log('tree empty');
			}
		});
	});



	function setupTree()
	{
		$('#tree-container').highCheckTree({
			data: catData,
            onCheck: function(checkbox){
				var checkedObj = $(checkbox[0]).attr('rel');
				var currList = $('#product-product_category_fk').val();
				if(currList == '')
				{
					$('#product-product_category_fk').val(checkedObj);
				}else{
					currList += ','+checkedObj;
					$('#product-product_category_fk').val(currList);
				}
				console.log($('#product-product_category_fk').val());
			},
			onUnCheck: function(checkbox){
				var uncheckedObj = $(checkbox[0]).attr('rel');
				var currList = $('#product-product_category_fk').val();
				currListArr = currList.split(',');
				if(currListArr.length == 1)
				{
					$('#product-product_category_fk').val('');
				}else{
					var valIndex = jQuery.inArray(uncheckedObj,currListArr);
					currListArr.splice(valIndex,1);
					$('#product-product_category_fk').val(currListArr.join());
				}
				console.log($('#product-product_category_fk').val());
			}
		});
	}
";

$specificationData = "data: {productId:'" . $model->product_id . "'}";

$specificationTreeJs = "
	var specData = [];
	$(function(){
		$.ajax({
			url: '../product-specification/get-specification-tree',
			{$specificationData}
		}).done(function(data){
			specData = jQuery.extend(true, [], data);
		});

		$(document).ajaxSuccess(function(event, xhr, settings){
			if(jQuery.isEmptyObject(specData) == false)
			{
				setupSpecificationTree();
			}else{
				console.log('setupSpecificationTree empty');
			}
		});
	});

	function setupSpecificationTree()
	{
		$('#specificationTree-container').highCheckTree({
			data: specData,
            onCheck: function(checkbox){
				var checkedObj = $(checkbox[0]).attr('rel');
				var currList = $('#product-product_specification_fk').val();
				if(currList == '')
				{
					$('#product-product_specification_fk').val(checkedObj);
				}else{
					currList += ','+checkedObj;
					$('#product-product_specification_fk').val(currList);
				}
				console.log($('#product-product_specification_fk').val());
			},
			onUnCheck: function(checkbox){
				var uncheckedObj = $(checkbox[0]).attr('rel');
				var currList = $('#product-product_specification_fk').val();
				currListArr = currList.split(',');
				if(currListArr.length == 1)
				{
					$('#product-product_specification_fk').val('');
				}else{
					var valIndex = jQuery.inArray(uncheckedObj,currListArr);
					currListArr.splice(valIndex,1);
					$('#product-product_specification_fk').val(currListArr.join());
				}
				console.log($('#product-product_specification_fk').val());
			}
		});
	}

";
$this->registerJs($chkbxTreeJs, View::POS_END, 'my-options');
$this->registerJs($specificationTreeJs, View::POS_END);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_desc')->textarea() ?>

    <?= $form->field($model, 'product_model_number') ?>

    <?= $form->field($model, 'product_price') ?>

    <?= $form->field($model, 'product_unit_weight') ?>

    <?= $form->field($model, 'product_unit') ?>

    <?= $form->field($model, 'product_origin') ?>

    <?= $form->field($model, 'product_manufacturer') ?>

    <?= $form->field($model, 'product_available_date')->widget(DatePicker::classname(), [
        'value' => $model->product_available_date,
        'options' => ['placeholder' => 'Select product available date ...'],
        'pluginOptions' => [
            'format' => 'dd/m/yyyy',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'product_quantity') ?>

    <?= $form->field($model, 'product_picture')->fileInput() ?>

    <?= $form->field($model, 'product_category_fk')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'merchant_brand_fk')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'product_specification_fk')->hiddenInput()->label(false) ?>

    <div class="row">
        <div class="control-label col-sm-3">
            <label>Parent Category</label>
        </div>
        <div id="tree-container" class="col-sm-3">

        </div>
    </div>

    <div class="row">
        <div class="control-label col-sm-3">
            <label>Parent Specification</label>
        </div>
        <div id="specificationTree-container" class="col-sm-3">

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
