<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Membership */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Membership',
]) . ' ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="membership-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
