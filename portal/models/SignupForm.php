<?php
namespace portal\models;

use common\models\Membership;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $membership_contact_telephone;
    public $membership_address;
    public $membership_first_name;
    public $membership_last_name;
    public $membership_date_of_birth;
    public $membership_current_points;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [
                'username',
                'unique',
                'targetClass' => '\common\models\User',
                'message' => 'This username has already been taken.'
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [
                'email',
                'unique',
                'targetClass' => '\common\models\User',
                'message' => 'This email address has already been taken.'
            ],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_confirmation', 'required'],

            [
                'password_confirmation',
                'compare',
                'compareAttribute' => 'password',
                'message' => "Passwords don't match"
            ],
            ['membership_contact_telephone', 'required'],
            ['membership_address', 'required'],
            ['captcha','captcha']
        ];
    }

    /**
     * Signs up member
     *
     * @param $signUp
     * @return $this|null
     */
    public function signUpUser($signUp)
    {
        if ($this->validate()) {

            $user = (new User())->store($signUp['username'], $signUp['password'], $signUp['email'], 'member');

            if ($user) {

                $signUp['membership_login_id'] = $user->id;

                (new Membership())->store(['Membership' => $signUp]);
            }

            return $user;
        }

        return null;

    }

}
