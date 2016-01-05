<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MerchantBrand */

$this->title = Yii::t('app', 'Create Merchant Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Merchant Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
