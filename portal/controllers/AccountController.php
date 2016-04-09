<?php
namespace portal\controllers;

use common\models\Membership;
use Yii;

class AccountController extends BaseController
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

    public function actionAddcredits()
    {
        if (empty(Yii::$app->user->identity)) {
            return false;
        }

        (new Membership())->updateBiddingPoints(
            $this->user->identity->membership->membership_login_id,
            ($this->user->identity->membership->membership_current_points + Yii::$app->request->get('credit'))
        );

        return true;
    }
}