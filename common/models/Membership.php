<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for collection "membership".
 *
 * @property \MongoId|string $_id
 * @property mixed $membership_unique_id
 * @property mixed $membership_login_id
 * @property mixed $membership_first_name
 * @property mixed $membership_last_name
 * @property mixed $membership_gender
 * @property mixed $membership_date_of_birth
 * @property mixed $membership_district
 * @property mixed $membership_address
 * @property mixed $membership_contact_telephone
 * @property mixed $membership_email_address
 * @property mixed $membership_current_points
 * @property mixed $membership_current_reputation
 * @property mixed $membership_date_of_joining
 * @property mixed $membership_create_date
 * @property mixed $membership_last_update_date
 * @property mixed $membership_status
 * @property mixed $membership_profile_image
 * @property mixed $membership_credits_points
 */
class Membership extends \yii\mongodb\ActiveRecord
{

    /**
     * @var string
     */
    public $captcha;

    public $upload_file;

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['auctionDB', 'membership'];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'membership_create_date',
                'updatedAtAttribute' => 'membership_last_update_date',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'membership_create_user_id',
                'updatedByAttribute' => 'membership_last_update_user_id',
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => ['membership_status'],
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
            'membership_create_date',
            'membership_create_user_id',
            'membership_last_update_date',
            'membership_last_update_user_id',
            'membership_status',
            'membership_credits_points',
            'membership_profile_image',
            'merchant_brand_fk',
            'interested_product_categories_fk',
            'captcha	'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['membership_contact_telephone', 'membership_login_id', 'membership_address'], 'required'],

            [
                'upload_file',
                'image',
                'extensions' => 'png',
                'minWidth' => 128,
                'maxWidth' => 128,
                'minHeight' => 128,
                'maxHeight' => 128,
            ],

            [
                [
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
                    'membership_credits_points',
                    'membership_profile_image',
                    'membership_create_date',
                    'membership_last_update_date',
                    'interested_product_categories_fk'
                ],
                'safe'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'membership_unique_id' => 'Membership Unique ID',
            'membership_login_id' => 'Membership Login ID',
            'membership_first_name' => 'Membership First Name',
            'membership_last_name' => 'Membership Last Name',
            'membership_gender' => 'Membership Gender',
            'membership_date_of_birth' => 'Membership Date Of Birth',
            'membership_district' => 'Membership District',
            'membership_address' => 'Membership Address',
            'membership_contact_telephone' => 'Membership Contact Telephone',
            'membership_email_address' => 'Membership Email Address',
            'membership_current_points' => 'Membership Current Points',
            'membership_current_reputation' => 'Membership Current Reputation',
            'membership_date_of_joining' => 'Membership Date Of Joining',
            'membership_status' => 'Membership Status',
            'membership_credits_points' => 'Membership Points Balance',
            'membership_profile_image' => 'Membership Profile Image Path',
            'upload_file' => 'Membership Profile Image',
            'membership_create_date' => 'Membership Create Date',
            'membership_create_user_id' => 'Membership Create User',
            'membership_last_update_date' => 'Membership Last Update Date',
            'membership_last_update_user_id' => 'Membership Last Update User',
            'interested_product_categories_fk' => 'Interested Product Categories'
        ];
    }

    public function getMerchantBrand()
    {
        return $this->hasOne(MerchantBrand::className(), ['_id' => 'merchant_brand_fk']);
    }

    public function uploadFile()
    {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, 'upload_file');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // generate random name for the file

        $this->membership_profile_image = 'membership_profile_' . time() . '.' . $image->extension;


        // the uploaded image instance
        return $image;
    }

    public function getUploadedFile()
    {
        // return a default image placeholder if your source avatar is not found

        $pic = isset($this->membership_profile_image) ? $this->membership_profile_image : 'default_mobile.png';


        return Yii::$app->params['fileUpload'] . $pic;
    }

    /**
     * Stores new Member;
     *
     * @param $member
     * @return $this|null
     */
    public function store($member)
    {
        $this->load($member);

        if ($this->save()) {
            return $this;
        }

        return null;
    }
}
