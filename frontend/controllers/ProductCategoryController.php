<?php

namespace frontend\controllers;

use Yii;
use common\models\ProductCategory;
use common\models\ProductCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
		
		$getParams = Yii::$app->request->get();	
		
		
		$searchCri = array('product_category_parent_id' => '');
		$allCategories = ProductCategory::findAll($searchCri);
		$jsonData = array();
		
		foreach($allCategories as $catLvl1)
		{
			$currObj = array();
			$checked = false;
			if(!empty($getParams))
			{
				if((($getParams['evalType'] == 'catParentId') && ($getParams['evalVal'] == $catLvl1->product_category_id)) || (($getParams['evalType'] == 'catId') && ($getParams['evalVal'] == $catLvl1->product_category_id)))
				{
					$checked = true;
				}
			}
			$currObj['item'] = array(
				'id' => $catLvl1->product_category_id,
				'label' => $catLvl1->product_category_name,
				'checked' => $checked,
			);
			if(!empty($catLvl1->subcategories))
			{
				$subCats = $catLvl1->subcategories;
				foreach($subCats as $catLvl2)
				{
					$checked2 = false;
					if(!empty($getParams))
					{
						if((($getParams['evalType'] == 'catParentId') && ($getParams['evalVal'] == $catLvl2->product_category_id)) || (($getParams['evalType'] == 'catId') && ($getParams['evalVal'] == $catLvl2->product_category_id)))
						{
							$checked2 = true;
						}
					}
					$currObj['children'][]['item'] = array(
						'id' => $catLvl2->product_category_id,
						'label' => $catLvl2->product_category_name,
						'checked' => $checked2,
					);
				}
			}
			$jsonData[] = $currObj;
		}
		
		return $jsonData;
	}
}
