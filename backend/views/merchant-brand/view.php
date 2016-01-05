<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\MerchantBrand */

$this->title = $model->merchant_brand_name1;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Merchant Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-brand-view">

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
            //'_id',
            'merchant_brand_id',
            'merchant_brand_name1',
            'merchant_brand_name2',
            'merchant_brand_tag',
            'merchant_brand_url',
            'merchant_brand_official_url',
            'merchant_brand_email',
			'logoImg:html',
            'mobileLogoImg:html',
            'merchant_brand_search_keywords',            
            'merchant_brand_create_date:datetime',
            'merchant_brand_last_update_date:datetime',
        ],
    ]) ?>
    
     <?php
		if(count($model->merchantBrandContacts) > 0)
		{
			$contactCnt = 1;
			foreach($model->merchantBrandContacts as $contact)
			{
				echo DetailView::widget([
					'model' => $contact,
					'attributes' => [
						['label' => 'Contact', 'value' => $contactCnt],
						'merchant_brand_contact_name',
						'merchant_brand_contact_title',
						'merchant_brand_contact_mobile',
						'merchant_brand_contact_email',
					],
				]);
				
				$contactCnt++;
			}
		}
     ?>

</div>
