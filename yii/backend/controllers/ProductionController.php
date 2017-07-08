<?php

namespace backend\controllers;

use Yii;
use backend\models\Production;
use backend\models\ProductionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\imagine\Image;
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

	
	public function actionUpload()
    {
        $upl_model = new UploadsForm();

        if (Yii::$app->request->isPost) {
            $upl_model->imageFile = UploadedFile::getInstance($upl_model, 'imageFile');
            if ($upl_model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $upl_model]);
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
            
            //get the instance of uploaded file
            $imageName = rand(1000,100000);
            $model->file = UploadedFile::getInstance($model, 'file');
           
            //saving
            $model->image = $imageName.'.'.$model->file->extension;
            $model->save();
            $model->file->saveAs(Yii::getAlias('@uploads/images/' . $imageName. '.' .$model->file->extension));
            //saving thumbnail
            $dirfrom = Yii::getAlias('@uploads/images/');
            $dirto = Yii::getAlias('@uploads/images/thumbs/');

           
            $sourceImage = Image::getImagine()->open($dirfrom . $imageName. '.' .$model->file->extension);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$newParam = min($origWidth, $origHeight);
			
			$size = new Box($newParam, $newParam);
			if($origWidth > $origHeight){ 
			    $x = $origWidth/4;
			    $point = new Point($x, 0);
			    }else {
			        $point = new Point(0, 0);
					}
                    $sourceImage->crop($point, $size)
			    ->thumbnail($size)
                ->save($dirto . $imageName.'.'.$model->file->extension, ['quality' => 90]);
            
            
          
           
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
        $current_image = $model->image;
        if ($model->load(Yii::$app->request->post())) {
		    $model->save();
            //get the instance of uploaded file
            $model->file = UploadedFile::getInstance($model, 'file');
             //Если загружается новое фото, удаляем старое            
                    if($model->file)
                    {
                        if(file_exists(Yii::getAlias('@uploads/images/' .$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@uploads/images/' .$current_image));
                            unlink(Yii::getAlias('@uploads/images/thumbs/' .$current_image));
                            $model->image = '';
                        }
                            //saving
                            //$model->save();
                            $model->file->saveAs(Yii::getAlias('@uploads/images/'.$current_image));
							//saving thumbnail
                            $dirfrom = Yii::getAlias('@uploads/images/');
                            $dirto = Yii::getAlias('@uploads/images/thumbs/');
							
            $sourceImage = Image::getImagine()->open($dirfrom . $current_image);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$newParam = min($origWidth, $origHeight);
			
            $size = new Box($newParam, $newParam);
			if($origWidth > $origHeight){ 
			    $x = $origWidth/4;
			    $point = new Point($x, 0);
			    }else {
			        $point = new Point(0, 0);
					}
                    $sourceImage->crop($point, $size)
			    ->thumbnail($size)
                ->save($dirto . $current_image, ['quality' => 90]);
                    }
               
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
        $current_image = $model->image;
        //удаляем файл, если он есть
        if(isset($current_image) && file_exists(Yii::getAlias('@uploads/images/' .$current_image))) { 
            unlink(Yii::getAlias('@uploads/images/' .$current_image));
			unlink(Yii::getAlias('@uploads/images/thumbs/' .$current_image));
        }
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
