<?php

namespace backend\controllers;

use Yii;
use backend\models\Production;
use backend\models\ProductionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\Point;
use yii\filters\AccessControl;
use backend\models\UploadsForm;
use yii\web\UploadedFile;

/**
 * ProductionController implements the CRUD actions for Production model.
 */
class ProductionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
		     'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	
	
	
    /**
     * Lists all Production models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Production model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Production model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Production();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
      
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Production model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Production model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //$current_images = Image::find()
		               // ->where(['id_production' => $model->id])
						//->all();
		//echo "<pre>";
		//print_r($current_image)	;
        //exit();		
        //удаляем файл, если он есть
		//foreach($current_images as $current_image){
		   //echo $current_image['imagePath'];
		    //if(isset($current_image) && file_exists(Yii::getAlias('@uploads/images/' .$current_image['imagePath']))) { 
            //unlink(Yii::getAlias('@uploads/images/' .$current_image['imagePath']));
		 	//unlink(Yii::getAlias('@uploads/images/thumbs/' .$current_image['imagePath']));
			//$imgmod = Image::find($current_image['id'])->one();
			//if($imgmod){
			 //   $imgmod->delete();
			//}
			//return $this->redirect(['upload', 'id'=>$this->id]);
         //}
		
		//}
       
       $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Production model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Production the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Production::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
