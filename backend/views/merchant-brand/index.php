<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use kartik\icons\Icon;

Icon::map($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\MerchantBrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Merchant Brands');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/merchantbrand-index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="row">
<div class="merchant-brand-index col-lg-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
		/* $gridColumns = [
			[
				'class' => '\kartik\grid\SerialColumn',
				'contentOptions'=>['class'=>'kartik-sheet-style'],
				'header'=>'',
				'headerOptions'=>['class'=>'kartik-sheet-style']
			],
			[
				'class' => '\kartik\grid\DataColumn',
				'format' => 'html',
				'content' => function($model,$key,$index){
					$imgLogoHtml = $model->getLogoImg();
					return $imgLogoHtml;
				},
			],
			[
				'attribute'=>'merchant_brand_name1', 
				'vAlign'=>'middle',
				'hAlign'=>'center', 		
			],
			[
				'attribute'=>'merchant_brand_name2', 
				'vAlign'=>'middle',
				'hAlign'=>'center', 	
			],
			[
				'attribute'=>'merchant_brand_tag', 
				'vAlign'=>'middle',
				'hAlign'=>'center', 		
			],
			[
				'attribute'=>'merchant_brand_url', 
				'vAlign'=>'middle',
				'hAlign'=>'center', 		
			],
			[
				'attribute'=>'merchant_brand_email', 
				'vAlign'=>'middle',
				'hAlign'=>'center', 		
			],			
		]; */
		$gridColumns = [
            [
				'class' => '\yii\grid\SerialColumn',				
			],
			[
				'class' => '\yii\grid\DataColumn',
				'format' => 'html',
				'content' => function($model,$key,$index){
					$imgLogoHtml = $model->getLogoImg();
					return $imgLogoHtml;
				},
			],
            //'_id',
            'merchant_brand_id',
            'merchant_brand_name1',
            'merchant_brand_name2',
            'merchant_brand_tag',
            'merchant_brand_url',
            //'merchant_brand_official_url',
            'merchant_brand_email',
            // 'merchant_brand_logo_img',
            // 'merchant_brand_logo_img_mobile',
            // 'merchant_brand_search_keywords',
            // 'merchant_brand_create_date',
            // 'merchant_brand_create_user_id',
            // 'merchant_brand_last_update_date',
            // 'merchant_brand_last_update_user_id',
            // 'merchant_brand_status',
			[
				'class' => '\yii\grid\ActionColumn',
				'template'=>'{view}',
				'header' => 'View memberships',
				'buttons' => [
					'view' => function ($url, $model, $key){
						return Html::a(Icon::show('users', ['class'=>'fa-lg'], Icon::FA),['membership/mb-memberships','membership' => $model->_id]);
					}
				],
			],
            [
				'class' => '\yii\grid\CheckboxColumn',
				'header' => 'Enabled',
				'checkboxOptions' => function ($model, $key, $index, $column) {
					return [
						'value' => $model->merchant_brand_id,
						'checked' => ($model->merchant_brand_status == 1)? true : false,
						'id' => 'enabled_'.$model->_id,
					];
				}
            ],
            ['class' => '\yii\grid\ActionColumn'],
        ];
	?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Merchant Brand'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
		'layout' => '{summary}<div style="overflow: auto; overflow-x: scroll; height:auto">{items}</div>{pager}',
    ]); 
    
    ?>
</div>
</div>
