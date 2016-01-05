<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MerchantBrand */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Merchant Brand',
]) . ' ' . $model->merchant_brand_name1;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Merchant Brands'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="merchant-brand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
