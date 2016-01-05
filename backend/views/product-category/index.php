<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'_id',
            'product_category_id',
            'product_category_parent_id',
            'product_category_name',
            'product_category_tag',
            // 'product_category_keywords',
            // 'product_category_icon',
            // 'product_category_icon_mobile',
            // 'product_category_create_date',
            // 'product_category_create_user_id',
            // 'product_category_last_update_date',
            // 'product_category_last_update_user_id',
            // 'product_category_status',
            // 'merchant_brand_fk',

            ['class' => 'yii\grid\ActionColumn'],
			
        ],
		'layout' => '{summary}<div style="overflow: auto; overflow-x: scroll; height:auto">{items}</div>{pager}',
    ]); ?>

</div>
