<?php
namespace frontend\controllers;

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
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        $post = Yii::$app->request->post();

        if (($post) && $model->loginByRole($post['LoginForm'])) {

            Yii::$app->getSession()->setFlash(
                'success', '<h1>Welcome, user ' . $model->username . '</h1>'
            );

            return $this->redirect(array('/product/index'));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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