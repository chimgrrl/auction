<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'product_id',
            'product_name',
            'product_model_number',
            'product_price',
            // 'product_unit_weight',
            // 'product_unit',
            // 'product_origin',
            // 'product_manufacturer',
            // 'product_available_date',
            // 'product_quantity',
            // 'product_ordered',
            // 'product_create_date',
            // 'product_create_user_id',
            // 'product_last_update_date',
            // 'product_last_update_user_id',
            // 'product_status',
            // 'product_category_fk',
            // 'product_specification_fk',
            // 'merchant_brand_fk',

            ['class' => 'yii\grid\ActionColumn'],
			
        ],
		'layout' => '{summary}<div style="overflow: auto; overflow-x: scroll; height:auto">{items}</div>{pager}',
    ]); ?>

</div>
