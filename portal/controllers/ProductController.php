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

        return $this->render('bidding', [
            'product' => $product
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

}