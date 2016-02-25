<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'product_id',
            'product_name',
            'product_model_number',
            'product_price',
            'product_unit_weight',
            'product_unit',
            'product_origin',
            'product_manufacturer',
            'product_available_date',
            'product_quantity',
            'product_ordered',
            'product_create_date:datetime',
            //'product_create_user_id',
            'product_last_update_date:datetime',
            //'product_last_update_user_id',
            //'product_status',
            //'product_category_fk',
            //'product_specification_fk',
            //'merchant_brand_fk',
        ],
    ]) ?>

</div>
