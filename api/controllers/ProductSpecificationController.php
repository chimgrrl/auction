<?php
namespace api\controllers;

use api\models\ProductSpecification;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
/**
 * Site controller
 */
class ProductSpecificationController extends ActiveController
{
	public $modelClass = 'api\models\ProductSpecification';
	
	public function actionSearch()
	{
		if (!empty($_GET)) {
			$model = new $this->modelClass;
			foreach ($_GET as $key => $value) {
				if (!$model->hasAttribute($key)) {
					throw new \yii\web\HttpException(404, 'Invalid attribute:' . $key);
				}
			}
			try {
				$provider = new ActiveDataProvider([
					'query' => $model->find()->where($_GET),
					'pagination' => false
				]);
			} catch (Exception $ex) {
				throw new \yii\web\HttpException(500, 'Internal server error');
			}

			if ($provider->getCount() <= 0) {
				throw new \yii\web\HttpException(404, 'No entries found with this query string');
			} else {
				return $provider;
			}
		} else {
			throw new \yii\web\HttpException(400, 'There are no query string');
		}
	}
}
