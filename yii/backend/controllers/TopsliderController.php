<?php
namespace backend\controllers;
use Yii;
use backend\models\Topslider;
use backend\models\TopsliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\filters\AccessControl;

/**
 * TopsliderController implements the CRUD actions for Topslider model.
 */
class TopsliderController extends Controller
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
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete'],
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
     * Lists all Topslider models.
     * @return mixed
     */
    public function actionIndex()
    {
	    $searchModel = new TopsliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topslider model.
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
     * Creates a new Topslider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Topslider();

            if ($model->load(Yii::$app->request->post())) {
            
            //get the instance of uploaded file
            $imageName = rand(1000,100000);
            $model->file = UploadedFile::getInstance($model, 'file');
           
            //saving
            $model->image = $imageName.'.'.$model->file->extension;
            $model->save();
            $model->file->saveAs(Yii::getAlias('@uploads/slider/' . $imageName. '.' .$model->file->extension));
            //saving thumbnail
            $dirfrom = Yii::getAlias('@uploads/slider/');
            $dirto = Yii::getAlias('@uploads/slider/thumb/');
            $imagine = new Image;
            $size    = new Box(1920, 699);

            //Image::getImagine()->open($dirfrom . $imageName. '.' .$model->file->extension)
                //->thumbnail($size)
                //->save($dirto . $imageName.'.'.$model->file->extension, ['quality' => 90]);
            Image::crop($dirfrom . $imageName. '.' .$model->file->extension, 1920, 699)
			    ->thumbnail($size)
                ->save($dirto . $imageName.'.'.$model->file->extension, ['quality' => 90]);
            
            
           // $photo = Image::getImagine()->open($dirfrom . $imageName. '.' .$model->file->extension);
                    //$photo->thumbnail(new Box(300, 300))->save($dirto . $imageName.'.'.$model->file->extension, ['quality' => 90]);
           
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Topslider model.
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
                        if(file_exists(Yii::getAlias('@uploads/slider/' .$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@uploads/slider/' .$current_image));
                            $model->image = '';
                        }
                            //saving
                            //$model->save();
                            $model->file->saveAs(Yii::getAlias('@uploads/slider/'.$current_image));
							//saving thumbnail
                            $dirfrom = Yii::getAlias('@uploads/slider/');
                            $dirto = Yii::getAlias('@uploads/slider/thumb/');
                            $imagine = new Image;
                            $size    = new Box(1920, 699);

                            //Image::getImagine()->open($dirfrom . $current_image)
                            //->thumbnail($size)
                            //->save($dirto . $current_image, ['quality' => 90]);
							Image::crop($dirfrom . $current_image, 1920, 699)
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
     * Deletes an existing Topslider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->image;
        //удаляем файл, если он есть
        if(isset($current_image) && file_exists(Yii::getAlias('@uploads/slider/' .$current_image))) { 
            unlink(Yii::getAlias('@uploads/slider/' .$current_image));
			unlink(Yii::getAlias('@uploads/slider/thumb/' .$current_image));
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Topslider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Topslider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topslider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
