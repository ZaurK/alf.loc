<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Category;
use frontend\models\SearchForm;
use yii\helpers\Html;

class CategoryController extends \yii\web\Controller
{

    public function beforeAction($action){
	    
		$model = new SearchForm();
		if($model->load(Yii::$app->request->post()) ){
		
		    $q = Html::encode($model->q);
			return $this->redirect(Yii::$app->urlManager->createUrl(['site/search', 'q'=>$q]));
		
		}
	    return true;
	
	
	}
	
    public function actionIndex()
    {
	    $this->layout = 'categorylayout';		
		 return $this->render('index');
		
    }
	
	 public function actionView($id)
    {
	    $this->layout = 'categorylayout';
		
		 return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
		
    }
	
	public function actionViewgood($id)
    {
	    $this->layout = 'categorylayout';
		
		 return $this->render('viewgood', [
            'model' => $this->findModel($id),
        ]);
		
    }
	
	 /**
     * Finds the Catalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionSearch(){
	    
		 $this->layout = 'searchlayout';
	    $q = Yii::$app->getRequest()->getQueryParam('q');
		$query = Production::find()->where(['like', 'ptitle', $q]);
	    $pagination = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 2]);

        $posts = $query->offset($pagination->offset)
		    ->limit($pagination->limit)
			->all();
        // Передаем данные в представление
        return $this->render('search', [
	     'posts' => $posts,
         'q' => $q,
         'pagination' => $pagination,
    ]);
	
	}
	

}
