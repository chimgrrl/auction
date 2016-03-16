<?php
namespace portal\controllers;

use common\models\Membership;
use common\models\User;
use Yii;
use yii\web\Controller;


class RegistrationController extends Controller
{
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new Membership();
        $user = new User();
        if ($model->load(Yii::$app->request->post())) {
            $postReq = Yii::$app->request->post();
            $user->username = $postReq['User']['username'];
            $user->email = $postReq['User']['email'];
            $user->new_password = $postReq['User']['new_password'];
            $user->setPassword();
            $user->save();
            $model->membership_login_id = $user->id;
            if ($model->save()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    public function actionAgreement()
    {
        return $this->render('agreement');
    }

}