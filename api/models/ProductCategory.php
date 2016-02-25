<?php

namespace api\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
/**
 * This is the model class for collection "product_category".
 *
 * @property \MongoId|string $_id
 * @property mixed $product_category_id
 * @property mixed $product_category_parent_id
 * @property mixed $product_category_name
 * @property mixed $product_category_tag
 * @property mixed $product_category_keywords
 * @property mixed $product_category_icon
 * @property mixed $product_category_icon_mobile
 * @property mixed $product_category_create_date
 * @property mixed $product_category_create_user_id
 * @property mixed $product_category_last_update_date
 * @property mixed $product_category_last_update_user_id
 * @property mixed $product_category_status
 * @property mixed $merchant_brand_fk
 */
class ProductCategory extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'product_category'];
    }
	
	public static function primaryKey()
	{
		return ['product_category_id'];
	}
	
	public function behaviors()
    {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'product_category_create_date',
				'updatedAtAttribute' => 'product_category_last_update_date',
			],					
			[
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'product_category_create_user_id',
				'updatedByAttribute' => 'product_category_last_update_user_id',
			],
			[
				'class' => AttributeBehavior::className(),
				'attributes' => ['product_category_status'],
				'value' => '1',
			],
			[
				'class' => '\yiidreamteam\upload\FileUploadBehavior',
				'attribute' => 'product_category_icon',
				'filePath' => '@uploads/[[filename]]_product_category_icon_[[id]].[[extension]]',
				'fileUrl' => '/auction/uploads/[[filename]]_product_category_icon_[[id]].[[extension]]',
			],
			[
				'class' => '\yiidreamteam\upload\FileUploadBehavior',
				'attribute' => 'product_category_icon_mobile',
				'filePath' => '@uploads/[[filename]]_product_category_icon_mobile_[[id]].[[extension]]',
				'fileUrl' => '/auction/uploads/[[filename]]_product_category_icon_mobile_[[id]].[[extension]]',
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
            'product_category_id',
            'product_category_parent_id',
            'product_category_name',
            'product_category_tag',
            'product_category_keywords',
            'product_category_icon',
            'product_category_icon_mobile',
            'product_category_create_date',
            'product_category_create_user_id',
            'product_category_last_update_date',
            'product_category_last_update_user_id',
            'product_category_status',
            'merchant_brand_fk',
        ];
    }
	
	public function fields()
	{
		return [
			'CID' => 'product_category_id',
			'CCID' => 'product_category_parent_id',
			'CNAME' => 'product_category_name',
			'CICON' => function(){
				return urlencode(Yii::$app->request->hostInfo.$this->getUploadedFileUrl('product_category_icon_mobile'));
			},
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id', 'product_category_parent_id', 'product_category_name', 'product_category_tag', 'product_category_keywords', 'product_category_icon', 'product_category_icon_mobile', 'product_category_create_date', 'product_category_create_user_id', 'product_category_last_update_date', 'product_category_last_update_user_id', 'product_category_status', 'merchant_brand_fk'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'product_category_id' => Yii::t('app', 'Product Category ID'),
            'product_category_parent_id' => Yii::t('app', 'Product Category Parent ID'),
            'product_category_name' => Yii::t('app', 'Product Category Name'),
            'product_category_tag' => Yii::t('app', 'Product Category Tag'),
            'product_category_keywords' => Yii::t('app', 'Product Category Keywords'),
            'product_category_icon' => Yii::t('app', 'Product Category Icon'),
            'product_category_icon_mobile' => Yii::t('app', 'Product Category Icon Mobile'),
            'product_category_create_date' => Yii::t('app', 'Product Category Create Date'),
            'product_category_create_user_id' => Yii::t('app', 'Product Category Create User ID'),
            'product_category_last_update_date' => Yii::t('app', 'Product Category Last Update Date'),
            'product_category_last_update_user_id' => Yii::t('app', 'Product Category Last Update User ID'),
            'product_category_status' => Yii::t('app', 'Product Category Status'),
            'merchant_brand_fk' => Yii::t('app', 'Merchant Brand Fk'),
        ];
    }
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if($insert){
				$this->product_category_id = Yii::$app->UtilHelper->randString(10);
			}
			return true;
		} else {
			return false;
		}
	}
	
	public function getSubcategories()
	{
		return $this->hasMany(ProductCategory::className(),['product_category_parent_id' => 'product_category_id']);
	}
	
	public function getProducts()
	{
		return $this->hasMany(Product::className(),['product_category_fk' => 'product_category_id']);
	}
}
