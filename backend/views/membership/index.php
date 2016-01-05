<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MembershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Memberships');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/membership-index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="membership-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Membership'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'_id',
            'membership_unique_id',
            'membership_login_id',
            'membership_first_name',
            'membership_last_name',
            // 'membership_gender',
            'membership_date_of_birth',
			//'merchant_brand_fk',
            // 'membership_district',
            // 'membership_address',
            // 'membership_contact_telephone',
            // 'membership_email_address',
            // 'membership_current_points',
            // 'membership_current_reputation',
            // 'membership_date_of_joining',
            // 'membership_status',
            // 'membership_profile_image',

            ['class' => 'yii\grid\ActionColumn'],
			[
				'class' => 'yii\grid\CheckboxColumn',
				'header' => 'Enabled',
				'checkboxOptions' => function ($model, $key, $index, $column) {
					return [
						'value' => $model->membership_unique_id,
						'checked' => ($model->membership_status == 1)? true : false,
						'id' => 'enabled_'.$model->_id,
					];
				}
            ],
        ],
		'layout' => '{summary}<div style="overflow: auto; overflow-x: scroll; height:auto">{items}</div>{pager}',
    ]); ?>

</div>
