<?php
namespace portal\controllers;

use common\models\Membership;
use common\models\ProductCategory;
use portal\models\SignupForm;
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
        $membership = new Membership();
        $signUpForm = new SignupForm();

        $parentCategories = ProductCategory::find()
            ->where(['product_category_parent_id' => ''])
            ->andWhere(['merchant_brand_fk' => ''])->all();

        $request = Yii::$app->request->post();

        if ($signUpForm->load($request)) {

            $request['SignupForm']['interested_product_categories_fk'] = $this->hasInterestedProductCategory(
                $request['SignupForm']);

            if ($user = $signUpForm->signUpUser($request['SignupForm'])) {
                if ($this->isLoggedIn($user)) {
                    return $this->redirect(['/account/profile']);
                }
            }
        }

        return $this->render('signup', [
            'membership' => $membership,
            'signUp' => $signUpForm,
            'productCategories' => $parentCategories
        ]);
    }

    /**
     * Loads up Agreement form
     *
     * @return string
     */
    public function actionAgreement()
    {
        return $this->render('agreement');
    }

    /**
     * @param $user
     * @return bool
     */
    private function isLoggedIn($user)
    {
        return Yii::$app->getUser()->login($user);
    }

    /**
     * @param $signUpForm
     * @return string
     */
    private function hasInterestedProductCategory($signUpForm)
    {
        if (!empty($signUpForm['interested_product_categories_fk'])) {
            return $this->attachProductCategoryId($signUpForm['interested_product_categories_fk']);
        }

        return '';
    }

    /**
     * @param $productCategories
     * @param string $glue
     * @return mixed
     */
    private function attachProductCategoryId($productCategories, $glue = ',')
    {
        return implode(',', $productCategories);
    }
}