<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Membership */

$this->title = $model->membership_first_name.' '.$model->membership_last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membership-view">

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
            'membership_unique_id',
            'membership_login_id',
            'membership_first_name',
            'membership_last_name',
            'membership_gender',
            'membership_date_of_birth',
            'membership_district',
            'membership_address',
            'membership_contact_telephone',
            'membership_email_address',
            'membership_current_points',
            'membership_current_reputation',
            'membership_date_of_joining',
            'membership_status',
            'membership_profile_image',
        ],
    ]) ?>

</div>
