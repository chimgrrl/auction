<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('@web/js/jquery.highCheckTree.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/highCheckTree.css");

$chkbxTreeJs = "
	var catData = [];
	$(function(){
		$.ajax({
			url: 'get-category-tree',
			data: {evalType: 'catParentId', evalVal: '{$model->product_category_parent_id}'}
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
				var currList = $('#productcategory-product_category_parent_id').val();
				if(currList == '')
				{					
					$('#productcategory-product_category_parent_id').val(checkedObj);
				}else{
					currList += ','+checkedObj;
					$('#productcategory-product_category_parent_id').val(currList);
				}				
				console.log($('#productcategory-product_category_parent_id').val());
			},
			onUnCheck: function(checkbox){
				var uncheckedObj = $(checkbox[0]).attr('rel');
				var currList = $('#productcategory-product_category_parent_id').val();
				currListArr = currList.split(',');
				if(currListArr.length == 1)
				{
					$('#productcategory-product_category_parent_id').val('');
				}else{
					var valIndex = jQuery.inArray(uncheckedObj,currListArr);
					currListArr.splice(valIndex,1);
					$('#productcategory-product_category_parent_id').val(currListArr.join());
				}
				console.log($('#productcategory-product_category_parent_id').val());
			}
		});
	}
";
$this->registerJs($chkbxTreeJs, View::POS_END, 'my-options');


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
