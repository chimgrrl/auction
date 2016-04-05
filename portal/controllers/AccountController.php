<?php
namespace portal\controllers;

use Yii;
use yii\web\Controller;
use common\models\Membership;

class AccountController extends Controller
{
    public function actionProfile()
    {
        $userId = Yii::$app->user->identity->getId();

        $member = Membership::findOne(['membership_login_id' => $userId]);

        return $this->render('profile', [
            'user' => Yii::$app->user->identity,
            'member' => $member,
        ]);
    }
}