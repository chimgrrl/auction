<?php
namespace portal\controllers;

use common\models\Product;
use Yii;


class ProductController extends BaseController
{
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionBidding()
    {
        $product = Product::find()
            ->where(['product_id' => Yii::$app->request->get('pid')])
            ->with('productCategory')
            ->one();

        if (empty($product->product_bidding_date)) {
            return $this->render('product_404');
        }

        $currentUser = (!empty($this->user->identity->username) ? $this->user->identity->username : '');

        return $this->render('bidding', [
            'product' => $product,
            'currentUser' => $currentUser,
            'bidUrl' => Yii::$app->getUrlManager()->createUrl('product/bidproduct')
        ]);

    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionForsell()
    {
        $product = Product::find()
            ->where(['product_id' => Yii::$app->request->get('pid')])
            ->with('productCategory')
            ->one();

        if (!empty($product->product_bidding_date)) {
            return $this->render('product_404');
        }

        return $this->render('forsell', [
            'product' => $product
        ]);
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionBid()
    {
        return $this->render('bid', [
        ]);
    }

    public function actionBidproduct()
    {
        $post = Yii::$app->request->post();

        if (empty($this->user->identity->username)) {
            return $this->redirect(['/auth/login']);
        }

        $productRequiredPoints = Product::findOne(['product_id' => $post['productId']])->product_required_points;
        $currentPoints = $this->user->identity->membership->membership_current_points;

        if ($currentPoints < $productRequiredPoints) {
            return \yii\helpers\Json::encode(false);
        }

        return \yii\helpers\Json::encode(true);
    }

}