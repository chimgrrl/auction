<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductSpecification */

$this->title = Yii::t('app', 'Create Product Specification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Specifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
