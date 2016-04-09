<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for collection "product_specification".
 *
 * @property \MongoId|string $_id
 * @property mixed $product_fk
 * @property mixed $membership_fk
 * @property mixed $bidding_price
 * @property mixed $created_date
 * @property mixed $status
 */
class MembershipProductBid extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'membership_product_bids'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'product_fk',
            'membership_fk',
            'bidding_price',
            'created_date',
            'status'
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'product_fk' => Yii::t('app', 'Product ID'),
            'membership_fk' => Yii::t('app', 'Membership ID'),
            'bidding_price' => Yii::t('app', 'Bidding Price'),
            'created_date' => Yii::t('app', 'Created Date'),
            'status' => Yii::t('app', 'Status')
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_date',
                'updatedAtAttribute' => 'created_date'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    '_id',
                    'product_fk',
                    'membership_fk',
                    'bidding_price',
                    'created_date',
                    'status'
                ],
                'safe'
            ]
        ];
    }

    public function store($payload)
    {
        $this->load($payload);

        if ($this->save()) {
            return $this;
        }

        return null;
    }
}