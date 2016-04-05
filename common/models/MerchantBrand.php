<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for collection "merchant_brand".
 *
 * @property \MongoId|string $_id
 * @property mixed $merchant_brand_id
 * @property mixed $merchant_brand_name1
 * @property mixed $merchant_brand_name2
 * @property mixed $merchant_brand_tag
 * @property mixed $merchant_brand_url
 * @property mixed $merchant_brand_official_url
 * @property mixed $merchant_brand_email
 * @property mixed $merchant_brand_logo_img
 * @property mixed $merchant_brand_logo_img_mobile
 * @property mixed $merchant_brand_search_keywords
 * @property mixed $merchant_brand_create_date
 * @property mixed $merchant_brand_create_user_id
 * @property mixed $merchant_brand_last_update_date
 * @property mixed $merchant_brand_last_update_user_id
 * @property mixed $merchant_brand_status
 * @property mixed $user_fk
 */
class MerchantBrand extends \yii\mongodb\ActiveRecord
{
    public $upload_file1;
    public $upload_file2;
	/**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'merchant_brand'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'merchant_brand_id',
            'merchant_brand_name1',
            'merchant_brand_name2',
            'merchant_brand_tag',
            'merchant_brand_url',
            'merchant_brand_official_url',
            'merchant_brand_email',
            'merchant_brand_logo_img',
            'merchant_brand_logo_img_mobile',
            'merchant_brand_search_keywords',
            'merchant_brand_create_date',
            'merchant_brand_create_user_id',
            'merchant_brand_last_update_date',
            'merchant_brand_last_update_user_id',
            'merchant_brand_status',
            'upload_file1',
            'upload_file2',
        ];
    }
    
    public function behaviors()
    {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'merchant_brand_create_date',
				'updatedAtAttribute' => 'merchant_brand_last_update_date',
			],					
			[
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'merchant_brand_create_user_id',
				'updatedByAttribute' => 'merchant_brand_last_update_user_id',
			],
			[
				'class' => AttributeBehavior::className(),
				'attributes' => ['merchant_brand_status'],
				'value' => '1',
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['merchant_brand_id','merchant_brand_name1','merchant_brand_tag','merchant_brand_url'],'required'],
			[['merchant_brand_url','merchant_brand_official_url'],'url'],			
			[['merchant_brand_email'],'email'],	
			[['merchant_brand_id','merchant_brand_name1', 'merchant_brand_name2', 'merchant_brand_tag'],'string'],
			[['merchant_brand_id'],'unique'],			
			['upload_file1', 'image', 'extensions' => 'png',
				'minWidth' => 256, 'maxWidth' => 256,
				'minHeight' => 256, 'maxHeight' => 256,
			],
			['upload_file2', 'image', 'extensions' => 'png',
				'minWidth' => 128, 'maxWidth' => 128,
				'minHeight' => 128, 'maxHeight' => 128,
			],
			 ['merchant_brand_status', 'in', 'range' => [0, 1]],
            [['merchant_brand_id', 'merchant_brand_name1', 'merchant_brand_name2', 'merchant_brand_tag', 'merchant_brand_url', 'merchant_brand_official_url', 'merchant_brand_email', 'merchant_brand_logo_img', 'merchant_brand_logo_img_mobile', 'merchant_brand_search_keywords', 'merchant_brand_create_date', 'merchant_brand_create_user_id', 'merchant_brand_last_update_date', 'merchant_brand_last_update_user_id', 'merchant_brand_status','user_fk'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'merchant_brand_id' => Yii::t('app', 'Merchant Brand ID'),
            'merchant_brand_name1' => Yii::t('app', 'Merchant Brand Name1'),
            'merchant_brand_name2' => Yii::t('app', 'Merchant Brand Name2'),
            'merchant_brand_tag' => Yii::t('app', 'Merchant Brand Tag'),
            'merchant_brand_url' => Yii::t('app', 'Merchant Brand Url'),
            'merchant_brand_official_url' => Yii::t('app', 'Merchant Brand Official Url'),
            'merchant_brand_email' => Yii::t('app', 'Merchant Brand Email'),
            'merchant_brand_logo_img' => Yii::t('app', 'Merchant Brand Logo Img'),
            'merchant_brand_logo_img_mobile' => Yii::t('app', 'Merchant Brand Logo Img Mobile'),
            'merchant_brand_search_keywords' => Yii::t('app', 'Merchant Brand Search Keywords'),
            'merchant_brand_create_date' => Yii::t('app', 'Merchant Brand Create Date'),
            'merchant_brand_create_user_id' => Yii::t('app', 'Merchant Brand Create User ID'),
            'merchant_brand_last_update_date' => Yii::t('app', 'Merchant Brand Last Update Date'),
            'merchant_brand_last_update_user_id' => Yii::t('app', 'Merchant Brand Last Update User ID'),
            'user_fk' => Yii::t('app', 'User Id fk'),
            'merchant_brand_status' => Yii::t('app', 'Merchant Brand Status'),
			'upload_file1' => Yii::t('app', 'Merchant Brand Logo Image'),
			'upload_file2' => Yii::t('app', 'Merchant Brand Logo Image for Mobile'),
        ];
    }
    
    public function getMerchantBrandContacts()
    {
		return $this->hasMany(MerchantBrandContact::className(),['merchant_brand_fk' => '_id']);
	}
	
	public function getMemberships()
    {
		return $this->hasMany(Membership::className(),['merchant_brand_fk' => '_id']);
	}
	
	public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_fk']);
    }
	
	public function uploadFile($instanceName) {
		// get the uploaded file instance
		$image = UploadedFile::getInstance($this, $instanceName);

		// if no image was uploaded abort the upload
		if (empty($image)) {
			return false;
		}

		// generate random name for the file
		if($instanceName == "upload_file1")
		{
			$this->merchant_brand_logo_img = 'logo_img_'.time(). '.' . $image->extension;
		}else{
			$this->merchant_brand_logo_img_mobile = 'logo_img_mobile_'.time(). '.' . $image->extension;
		}

		// the uploaded image instance
		return $image;
	}
	
	public function getUploadedFile($instanceName) {
        // return a default image placeholder if your source avatar is not found
		if($instanceName == "logo_img")
		{
			$pic = isset($this->merchant_brand_logo_img) ? $this->merchant_brand_logo_img : 'default.png';
		}else{
			$pic = isset($this->merchant_brand_logo_img_mobile) ? $this->merchant_brand_logo_img_mobile : 'default_mobile.png';
		}
        
        return Yii::$app->params['fileUpload']. $pic;
    }
	
	public function getLogoImg()
	{
		$imgLogoHtml = "<img width='100' src='".Yii::$app->request->hostInfo.Yii::$app->params['fileUploadUrl'];
		if(!empty($model->merchant_brand_logo_img))
		{
			$imgLogoHtml .= $model->merchant_brand_logo_img;
		}else{
			$imgLogoHtml .= "default.png";
		}
		$imgLogoHtml .= "'>";
		return $imgLogoHtml;
	}
	
	public function getMobileLogoImg()
	{
		$imgLogoHtml = "<img width='100' src='".Yii::$app->request->hostInfo.Yii::$app->params['fileUploadUrl'];
		if(!empty($model->merchant_brand_logo_img_mobile))
		{
			$imgLogoHtml .= $model->merchant_brand_logo_img_mobile;
		}else{
			$imgLogoHtml .= "default_mobile.png";
		}
		$imgLogoHtml .= "'>";
		return $imgLogoHtml;
	}
}
