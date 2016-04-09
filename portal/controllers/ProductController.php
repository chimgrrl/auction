<?php
namespace portal\controllers;

use common\models\Membership;
use common\models\Product;
use Yii;
use common\models\MembershipProductBid;
use dosamigos\qrcode\formats\MailTo;
use dosamigos\qrcode\QrCode;


class ProductController extends BaseController
{

    public function actionQrcode()
    {
        $mailTo = new MailTo(['email' => 'email@example.com']);
        return QrCode::png($mailTo->getText());
        // you could also use the following
        // return return QrCode::png($mailTo);
    }

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

        $productBid = [
            'MembershipProductBid' => [
                'product_fk' => $post['productId'],
                'membership_fk' => $this->user->identity->membership->membership_login_id,
                'bidding_price' => $post['myBiddingPrice'],
                'status' => "pending"
            ]
        ];

        if ((new MembershipProductBid)->store($productBid)) {
            (new Membership())->updateBiddingPoints(
                $this->user->identity->membership->membership_login_id,
                ($currentPoints - $productRequiredPoints)
            );
        }

        return \yii\helpers\Json::encode(true);
    }
    

}