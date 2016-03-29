<?php
namespace portal\controllers;

use common\models\LoginForm;
use Yii;
use yii\web\Controller;


class AuthController extends Controller
{
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $loginForm = new LoginForm();

        $post = Yii::$app->request->post();

        if (($post) && $loginForm->loginByRole($post['LoginForm'])) {
            return $this->goHome();
        }

        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);

    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}