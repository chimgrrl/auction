<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for collection "product".
 *
 * @property \MongoId|string $_id
 * @property mixed $product_id
 * @property mixed $product_name
 * @property mixed $product_desc
 * @property mixed $product_model_number
 * @property mixed $product_price
 * @property mixed $product_unit_weight
 * @property mixed $product_unit
 * @property mixed $product_origin
 * @property mixed $product_manufacturer
 * @property mixed $product_available_date
 * @property mixed $product_bidding_date
 * @property mixed $product_quantity
 * @property mixed $product_ordered
 * @property mixed $product_create_date
 * @property mixed $product_create_user_id
 * @property mixed $product_last_update_date
 * @property mixed $product_last_update_user_id
 * @property mixed $product_statusd
 * @property mixed $product_category_fk
 * @property mixed $product_specification_fk
 * @property mixed $merchant_brand_fk
 * @property mixed $product_required_points
 * @property mixed $product_bidding_price
 */
class Product extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'product'];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'product_create_date',
                'updatedAtAttribute' => 'product_last_update_date',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'product_create_user_id',
                'updatedByAttribute' => 'product_last_update_user_id',
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => ['product_status'],
                'value' => '1',
            ],
            [
                'class' => '\yiidreamteam\upload\FileUploadBehavior',
                'attribute' => 'product_picture',
                'filePath' => '@uploads/[[filename]]_product_picture_[[id]].[[extension]]',
                'fileUrl' => '/auction/uploads/[[filename]]_product_picture_[[id]].[[extension]]',
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
            'product_id',
            'product_name',
            'product_desc',
            'product_picture',
            'product_model_number',
            'product_old_price',
            'product_price',
            'product_unit_weight',
            'product_unit',
            'product_origin',
            'product_manufacturer',
            'product_bidding_date',
            'product_available_date',
            'product_quantity',
            'product_ordered',
            'product_create_date',
            'product_create_user_id',
            'product_last_update_date',
            'product_last_update_user_id',
            'product_status',
            'product_category_fk',
            'product_specification_fk',
            'merchant_brand_fk',
            'product_required_points',
            'product_bidding_price'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_name', 'product_desc', 'product_picture', 'product_model_number', 'product_price', 'product_unit_weight', 'product_unit', 'product_origin', 'product_manufacturer', 'product_bidding_date', 'product_available_date', 'product_quantity', 'product_ordered', 'product_create_date', 'product_create_user_id', 'product_last_update_date', 'product_last_update_user_id', 'product_status', 'product_category_fk', 'product_specification_fk', 'merchant_brand_fk'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_desc' => Yii::t('app', 'Product Description'),
            'product_picture' => Yii::t('app', 'Product Picture'),
            'product_model_number' => Yii::t('app', 'Product Model Number'),
            'product_price' => Yii::t('app', 'Product Price'),
            'product_unit_weight' => Yii::t('app', 'Product Unit Weight'),
            'product_unit' => Yii::t('app', 'Product Unit'),
            'product_origin' => Yii::t('app', 'Product Origin'),
            'product_manufacturer' => Yii::t('app', 'Product Manufacturer'),
            'product_available_date' => Yii::t('app', 'Product Available Date'),
            'product_bidding_date' => Yii::t('app', 'Product Bidding Deadline'),
            'product_quantity' => Yii::t('app', 'Product Quantity'),
            'product_ordered' => Yii::t('app', 'Product Ordered'),
            'product_create_date' => Yii::t('app', 'Product Create Date'),
            'product_create_user_id' => Yii::t('app', 'Product Create User ID'),
            'product_last_update_date' => Yii::t('app', 'Product Last Update Date'),
            'product_last_update_user_id' => Yii::t('app', 'Product Last Update User ID'),
            'product_status' => Yii::t('app', 'Product Status'),
            'product_category_fk' => Yii::t('app', 'Product Category Fk'),
            'product_specification_fk' => Yii::t('app', 'Product Specification Fk'),
            'merchant_brand_fk' => Yii::t('app', 'Merchant Brand Fk'),
            'product_required_points' => Yii::t('app', 'Product Required Points'),
            'product_bidding_price' => Yii::t('app', 'Product Bidding Price')
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->product_id = Yii::$app->UtilHelper->randString(10);
                $this->product_status = 1;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['product_category_id' => 'product_category_fk']);
    }

    public function getMerchantBrand()
    {
        return $this->hasOne(MerchantBrand::className(), ['merchant_brand_id' => 'merchant_brand_fk']);
    }

    public function getProductSpecification()
    {
        return $this->hasOne(ProductSpecification::className(), ['product_specification_id' => 'product_specification_fk']);
    }
}
