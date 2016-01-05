<?php

namespace backend\controllers;

use Yii;
use common\models\Membership;
use common\models\MembershipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\mongodb\Collection;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

/**
 * MembershipController implements the CRUD actions for Membership model.
 */
class MembershipController extends Controller
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
     * Lists all Membership models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembershipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionMbMemberships()
	{
		$getVars = Yii::$app->request->queryParams;
		$mbFk = $getVars["membership"]["\$id"];
		
		$query = Membership::find()->where(['merchant_brand_fk' => new \MongoId($mbFk)]);
		$searchModel = new MembershipSearch();
		
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			],			
		]);

		
		return $this->render('index', [
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

    /**
     * Displays a single Membership model.
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
     * Creates a new Membership model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Membership();
		$queryStrArr = Yii::$app->request->post();
		if(!empty($queryStrArr))
		{
			
			$model->load($queryStrArr);
			$model->membership_unique_id = Yii::$app->UtilHelper->randString(10);
			$model->membership_date_of_joining = date('d/m/Y');
			$model->membership_status = "1";
			$upload_file = $model->uploadFile();
			if ($upload_file !== false) {
				$path = $model->getUploadedFile();
				$upload_file->saveAs($path);
			}
			if ($model->save()) {
				return $this->redirect(['view', 'id' => (string)$model->_id]);
			}
		}else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Membership model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$queryStrArr = Yii::$app->request->post();
		if(!empty($queryStrArr))
		{
			$model->load($queryStrArr);
			$upload_file = $model->uploadFile();
			if ($upload_file !== false) {
				$path = $model->getUploadedFile();
				$upload_file->saveAs($path);
			}
			if ($model->save()) {
				return $this->redirect(['view', 'id' => (string)$model->_id]);
			}
		}else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
         
    }

    /**
     * Deletes an existing Membership model.
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
     * Finds the Membership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $_id
     * @return Membership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Membership::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
