<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSpecification */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Specifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specification-view">

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
            'product_specification_id',
            'product_specification_name',
            'product_specification_tag',
            'product_specification_prefix',
            'product_specification_value_price',
            //'product_specification_create_date',
            //'product_specification_create_user_id',
            //'product_specification_last_update_date',
            //'product_specification_last_update_user_id',
            //'product_specification_status',
            //'merchant_brand_fk',
        ],
    ]) ?>

</div>
