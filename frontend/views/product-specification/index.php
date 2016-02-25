<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSpecificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Specifications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specification-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Specification'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'product_specification_id',
            'product_specification_name',
            'product_specification_tag',
            'product_specification_prefix',
            // 'product_specification_value_price',
            // 'product_specification_create_date',
            // 'product_specification_create_user_id',
            // 'product_specification_last_update_date',
            // 'product_specification_last_update_user_id',
            // 'product_specification_status',
            // 'merchant_brand_fk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
		'layout' => '{summary}<div style="overflow: auto; overflow-x: scroll; height:auto">{items}</div>{pager}',
    ]
); ?>

</div>
