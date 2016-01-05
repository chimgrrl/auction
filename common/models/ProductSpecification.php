<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
/**
 * This is the model class for collection "product_specification".
 *
 * @property \MongoId|string $_id
 * @property mixed $product_specification_id
 * @property mixed $product_specification_parent_id
 * @property mixed $product_specification_name
 * @property mixed $product_specification_tag
 * @property mixed $product_specification_prefix
 * @property mixed $product_specification_value_price
 * @property mixed $product_specification_create_date
 * @property mixed $product_specification_create_user_id
 * @property mixed $product_specification_last_update_date
 * @property mixed $product_specification_last_update_user_id
 * @property mixed $product_specification_status
 * @property mixed $merchant_brand_fk
 */
class ProductSpecification extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'product_specification'];
    }
	
	public function behaviors()
    {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'product_specification_create_date',
				'updatedAtAttribute' => 'product_specification_last_update_date',
			],					
			[
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'product_specification_create_user_id',
				'updatedByAttribute' => 'product_specification_last_update_user_id',
			],
			[
				'class' => AttributeBehavior::className(),
				'attributes' => ['product_specification_status'],
				'value' => '1',
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'product_specification_id',
            'product_specification_parent_id',
            'product_specification_name',
            'product_specification_tag',
            'product_specification_prefix',
            'product_specification_value_price',
            'product_specification_create_date',
            'product_specification_create_user_id',
            'product_specification_last_update_date',
            'product_specification_last_update_user_id',
            'product_specification_status',
            'merchant_brand_fk',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_specification_id','product_specification_parent_id', 'product_specification_name', 'product_specification_tag', 'product_specification_prefix', 'product_specification_value_price', 'product_specification_create_date', 'product_specification_create_user_id', 'product_specification_last_update_date', 'product_specification_last_update_user_id', 'product_specification_status', 'merchant_brand_fk'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'product_specification_id' => Yii::t('app', 'Product Specification ID'),
            'product_specification_parent_id' => Yii::t('app', 'Product Specification parent ID'),
            'product_specification_name' => Yii::t('app', 'Product Specification Name'),
            'product_specification_tag' => Yii::t('app', 'Product Specification Tag'),
            'product_specification_prefix' => Yii::t('app', 'Product Specification Prefix'),
            'product_specification_value_price' => Yii::t('app', 'Product Specification Value Price'),
            'product_specification_create_date' => Yii::t('app', 'Product Specification Create Date'),
            'product_specification_create_user_id' => Yii::t('app', 'Product Specification Create User ID'),
            'product_specification_last_update_date' => Yii::t('app', 'Product Specification Last Update Date'),
            'product_specification_last_update_user_id' => Yii::t('app', 'Product Specification Last Update User ID'),
            'product_specification_status' => Yii::t('app', 'Product Specification Status'),
            'merchant_brand_fk' => Yii::t('app', 'Merchant Brand Fk'),
        ];
    }
}
