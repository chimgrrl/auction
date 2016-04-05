<?php

namespace frontend\controllers;

use common\models\Product;
use Yii;
use common\models\ProductSpecification;
use common\models\ProductSpecificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductSpecificationController implements the CRUD actions for ProductSpecification model.
 */
class ProductSpecificationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductSpecification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSpecificationSearch();
        $queryParams = Yii::$app->request->queryParams;

        $queryParams['ProductSpecificationSearch']['merchant_brand_fk'] = Yii::$app->user->getIdentity()->username;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductSpecification model.
     * @param integer $_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductSpecification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductSpecification();

        $parentSpecifications = ProductSpecification::findAll([
            'product_specification_parent_id' => '',
            'merchant_brand_fk' => Yii::$app->user->getIdentity()->username
        ]);

        $model->merchant_brand_fk = Yii::$app->user->getIdentity()->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'parentSpecifications' => $parentSpecifications
            ]);
        }
    }

    /**
     * Updates an existing ProductSpecification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $parentSpecifications =
            ProductSpecification::find()
                ->where([
                    'product_specification_parent_id' => '',
                    'merchant_brand_fk' => Yii::$app->user->getIdentity()->username
                ])
                ->andWhere(['NOT', 'product_specification_id', $model->product_specification_id])
                ->all();

        $model->merchant_brand_fk = Yii::$app->user->getIdentity()->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'parentSpecifications' => $parentSpecifications
            ]);
        }
    }

    /**
     * Deletes an existing ProductSpecification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductSpecification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return ProductSpecification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductSpecification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetSpecificationTree()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $productSpecificationKeys = $this->getProductSpecificationKeys(Yii::$app->request->get('productId'));

        $productSpecifications = ProductSpecification::findAll([
            'product_specification_parent_id' => '',
            'merchant_brand_fk' => Yii::$app->user->getIdentity()->username
        ]);

        return $this->buildSpecificationTree($productSpecificationKeys, $productSpecifications);
    }

    /**
     * @param int $productId
     * @return array
     */
    private function getProductSpecificationKeys($productId)
    {
        $productSpecificationKeys = [];

        if ($productId == '') {
            return $productSpecificationKeys;
        }

        $productSpecifications = Product::findOne(['product_id' => $productId])->product_specification_fk;

        if (!empty($productSpecifications)) {
            $productSpecificationKeys = explode(',', $productSpecifications);
        }

        return $productSpecificationKeys;
    }

    /**
     * @param array $productSpecificationKeys
     * @param object $productSpecifications
     * @return array
     */
    private function buildSpecificationTree($productSpecificationKeys, $productSpecifications)
    {
        $specifications = [];

        foreach ($productSpecifications as $parentSpecification) {

            $specification = [];

            $specification['item'] = [
                'id' => $parentSpecification->product_specification_id,
                'label' => $parentSpecification->product_specification_name,
                'checked' => $this->isChecked($parentSpecification->product_specification_id, $productSpecificationKeys)
            ];

            $specification = $this->attachChildSpecification(
                $specification,
                $productSpecificationKeys,
                $parentSpecification);

            $specifications[] = $specification;
        }

        return $specifications;
    }

    /**
     * @param $specification
     * @param array $productSpecificationKeys
     * @param object $parentSpecification
     * @return mixed
     */
    private function attachChildSpecification($specification, $productSpecificationKeys, $parentSpecification)
    {
        if (empty($parentSpecification->subspecifications)) {
            return $specification;
        }

        $childSpecifications = $parentSpecification->subspecifications;

        foreach ($childSpecifications as $childSpecification) {
            $specification['children'][]['item'] = [
                'id' => $childSpecification->product_specification_id,
                'label' => $childSpecification->product_specification_name,
                'checked' => $this->isChecked($childSpecification->product_specification_id, $productSpecificationKeys)
            ];
        }

        return $specification;
    }

    /**
     * @param int $productSpecificationId
     * @param array $productSpecificationKeys
     * @return bool
     */
    private function isChecked($productSpecificationId, $productSpecificationKeys)
    {
        return in_array($productSpecificationId, $productSpecificationKeys) ?: false;
    }
}
