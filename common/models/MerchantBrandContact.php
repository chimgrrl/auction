<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "merchant_brand_contact".
 *
 * @property \MongoId|string $_id
 * @property mixed $merchant_brand_contact_name
 * @property mixed $merchant_brand_contact_title
 * @property mixed $merchant_brand_contact_mobile
 * @property mixed $merchant_brand_contact_email
 * @property mixed $merchant_brand_fk
 */
class MerchantBrandContact extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'merchant_brand_contact'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'merchant_brand_contact_name',
            'merchant_brand_contact_title',
            'merchant_brand_contact_mobile',
            'merchant_brand_contact_email',
            'merchant_brand_fk',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_brand_contact_name', 'merchant_brand_contact_title', 'merchant_brand_contact_mobile', 'merchant_brand_contact_email', 'merchant_brand_fk'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'merchant_brand_contact_name' => 'Merchant Brand Contact Name',
            'merchant_brand_contact_title' => 'Merchant Brand Contact Title',
            'merchant_brand_contact_mobile' => 'Merchant Brand Contact Mobile',
            'merchant_brand_contact_email' => 'Merchant Brand Contact Email',
            'merchant_brand_fk' => 'Merchant Brand Fk',
        ];
    }
    
    public function getMerchantBrand()
    {
		return $this->hasOne(MerchantBrand::className(),['_id' => 'merchant_brand_fk']);
	}
}
