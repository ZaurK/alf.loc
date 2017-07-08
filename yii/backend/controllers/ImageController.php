<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\UploadsForm;
use backend\models\Image;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ImageController extends Controller
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
                        'actions' => ['upload', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }
	
    public function actionUpload()
    {
        $model = new UploadsForm();
		$modeldata = new Image();
		
		$modeldata->id_production = isset($_GET['id']) ? $_GET['id'] : null;

        if (Yii::$app->request->isPost) {
		    $imageName = rand(1000,100000);
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');			
			
            if ($model->upload($imageName)) {
                // file is uploaded successfully
				    $modeldata->imagePath = $imageName.'.'.$model->imageFile->extension;				
				    $modeldata->save();
				 return $this->redirect(Yii::$app->request->referrer);
				
				
               
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
	
	public function actionDelete($id)
    {
        $modeldata = $this->findModel($id);
        $current_image = $modeldata->imagePath;
        //удаляем файл, если он есть
        if(isset($current_image) && file_exists(Yii::getAlias('@uploads/images/' .$current_image))) { 
            unlink(Yii::getAlias('@uploads/images/' .$current_image));
			unlink(Yii::getAlias('@uploads/images/thumbs/' .$current_image));
        }
        $this->findModel($id)->delete();
        
        return $this->redirect(Yii::$app->request->referrer);
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
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}