<?php
namespace frontend\controllers;

use frontend\models\SignupForm;
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
        $signUpModel = new SignupForm();

        $request = Yii::$app->request->post();

        if ($signUpModel->load($request)) {

            if($user = $signUpModel->signUpUser($request['SignupForm']))
            {
                if ($this->isLoggedIn($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $signUpModel,
        ]);
    }



    private function isLoggedIn($user)
    {
        return Yii::$app->getUser()->login($user);
    }


}