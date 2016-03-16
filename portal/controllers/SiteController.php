<?php
namespace portal\controllers;

use common\models\Membership;
use common\models\Product;
use common\models\ProductCategory;
use common\models\User;
use portal\models\ContactForm;
use portal\models\PasswordResetRequestForm;
use portal\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $allCategories = ProductCategory::find()->with('products')->all();
        $allProducts = Product::find()->all();
        $recProducts = array();

        for ($i = 0; $i < 3; $i++) {
            $currRand = rand(0, count($allProducts) - 1);
            $recProducts[] = $allProducts[$currRand];
        }
        return $this->render('index', [
            'allCats' => $allCategories,
            'recProducts' => $recProducts,
        ]);
    }

    public function actionProduct()
    {
        $product = Product::find()->where(['product_id' => Yii::$app->request->get('pid')])
            ->with('productCategory')
            ->one();

        $productCategory = ProductCategory::findOne(['product_category_id' => Yii::$app->request->get('cid')])
            ->product_category_name;

        $biddingDate = (!empty($product->product_bidding_date)) ?
            $this->convertDateFormat($product->product_bidding_date) : '';

        return $this->render('product', [
            'product' => $product,
            'biddingDate' => $biddingDate,
            'productCategory' => $productCategory
        ]);
    }



    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success',
                    'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

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

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Convert Date format
     *
     * @param $date
     * @param string $format
     * @return bool|string
     */
    private function convertDateFormat($date, $format = 'Y/m/d')
    {
        $date = str_replace('/', '-', $date);

        return date($format, strtotime($date));
    }
}
