<?php

namespace backend\controllers;

use common\models\Product;
use common\models\ProductCategory;
use common\models\ProductCategorySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductCategoryController implements the CRUD actions for ProductCategory model.
 */
class ProductCategoryController extends Controller
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
     * Lists all ProductCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductCategory model.
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
     * Creates a new ProductCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategory();
        $parentCategories = ProductCategory::findAll(['product_category_parent_id' => '']);

        $model->merchant_brand_fk = '';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'parentCategories' => $parentCategories
            ]);
        }
    }

    /**
     * Updates an existing ProductCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $parentCategories =
            ProductCategory::find()
                ->where(['product_category_parent_id' => ''])
                ->andWhere(['NOT', 'product_category_id', $model->product_category_id])
                ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'parentCategories' => $parentCategories
            ]);
        }
    }

    /**
     * Deletes an existing ProductCategory model.
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
     * Finds the ProductCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return ProductCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetCategoryTree()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $productCategoryKeys = $this->getProductCategoryKeys(Yii::$app->request->get('productId'));

        $productCategories = ProductCategory::findAll(['product_category_parent_id' => '']);


        return $this->buildCategoryTree($productCategoryKeys, $productCategories);

    }

    /**
     * Get all categories associated on a product
     *
     * @param $productId
     * @return array
     */
    private function getProductCategoryKeys($productId)
    {
        $productCategoryKeys = [];

        if ($productId == '') {
            return $productCategoryKeys;
        }

        $productCategories = Product::findOne(['product_id' => $productId])->product_category_fk;

        if (!empty($productCategories)) {
            $productCategoryKeys = explode(',', $productCategories);
        }

        return $productCategoryKeys;
    }

    /**
     * Build Category Tree
     *
     * @param array $productCategoryKeys
     * @param object $productCategories
     * @return array
     */
    private function buildCategoryTree($productCategoryKeys, $productCategories)
    {
        $categories = [];

        foreach ($productCategories as $parentCategory) {

            $category = [];

            $category['item'] = [
                'id' => $parentCategory->product_category_id,
                'label' => $parentCategory->product_category_name,
                'checked' => $this->isChecked($parentCategory->product_category_id, $productCategoryKeys)
            ];

            $category = $this->attachChildCategory($category, $productCategoryKeys, $parentCategory);

            $categories[] = $category;
        }

        return $categories;
    }

    /**
     * Attach Child Category to Parent
     *
     * @param array $category
     * @param array $productCategoryKeys
     * @param object $parentCategory
     * @return array
     */
    private function attachChildCategory($category, $productCategoryKeys, $parentCategory)
    {
        if (empty($parentCategory->subcategories)) {
            return $category;
        }

        $childCategories = $parentCategory->subcategories;

        foreach ($childCategories as $childCategory) {
            $category['children'][]['item'] = [
                'id' => $childCategory->product_category_id,
                'label' => $childCategory->product_category_name,
                'checked' => $this->isChecked($childCategory->product_category_id, $productCategoryKeys)
            ];
        }

        return $category;

    }

    /**
     * Helper to check category if checked
     *
     * @param string $productCategoryId
     * @param array $productCategoryKeys
     * @return bool
     */
    private function isChecked($productCategoryId, $productCategoryKeys)
    {
        return in_array($productCategoryId, $productCategoryKeys) ?: false;
    }
}
