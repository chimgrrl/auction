<?php
namespace portal\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    protected $auctionHelper;
    protected $user;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->auctionHelper = Yii::$app->helper;
        $this->user = Yii::$app->user;
    }

}