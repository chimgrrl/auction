<?php

namespace backend\controllers;

use Yii;
use common\models\MerchantBrand;
use common\models\MerchantBrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MerchantBrandController implements the CRUD actions for MerchantBrand model.
 */
class MerchantBrandController extends Controller
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
     * Lists all MerchantBrand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MerchantBrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MerchantBrand model.
     * @param integer $_id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
		return $this->render('view', [
            'model' => $model,
			'contacts' => $model->merchantBrandContacts,
        ]);
    }

    /**
     * Creates a new MerchantBrand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MerchantBrand();
        
        $postReq = Yii::$app->request->post();
        
        if(!empty($postReq))
        {
			$upload_file1 = $model->uploadFile('upload_file1');
			$upload_file2 = $model->uploadFile('upload_file2');
			
			$searchkeywords = $postReq['MerchantBrand']['merchant_brand_search_keywords'];
			$postReq['MerchantBrand']['merchant_brand_search_keywords'] = explode(",",$searchkeywords);
			$postReq['MerchantBrand']['merchant_brand_status'] = 1;
			$model->load($postReq);
			if ($model->insert()) {
				if ($upload_file1 !== false) {
					$path1 = $model->getUploadedFile('logo_img');
					$upload_file1->saveAs($path1);
				}
				if ($upload_file2 !== false) {
					$path2 = $model->getUploadedFile('logo_img_mobile');
					$upload_file2->saveAs($path2);
				}
				return $this->redirect(['view', 'id' => (string)$model->_id]);
			}else{
				echo "failed: ";
				var_dump($model->errors);
			}
		}else{
			return $this->render('create', [
                'model' => $model,
            ]);
		}
        

        
    }

    /**
     * Updates an existing MerchantBrand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $postReq = Yii::$app->request->post();
        
        if(!empty($postReq))
        {
			$upload_file1 = $model->uploadFile('upload_file1');
			$upload_file2 = $model->uploadFile('upload_file2');
			
			$searchkeywords = $postReq['MerchantBrand']['merchant_brand_search_keywords'];
			$postReq['MerchantBrand']['merchant_brand_search_keywords'] = explode(",",$searchkeywords);
			
			$model->load($postReq);
			if ($model->save()) {
				if ($upload_file1 !== false) {
					$path1 = $model->getUploadedFile('logo_img');
					$upload_file1->saveAs($path1);
				}
				if ($upload_file2 !== false) {
					$path2 = $model->getUploadedFile('logo_img_mobile');
					$upload_file2->saveAs($path2);
				}
				return $this->redirect(['view', 'id' => (string)$model->_id]);
			} 
		}else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }	

    /**
     * Deletes an existing MerchantBrand model.
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
     * Finds the MerchantBrand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return MerchantBrand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MerchantBrand::findOne($id)) !== null) {
			$model->merchant_brand_search_keywords = implode(", ",$model->merchant_brand_search_keywords);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
