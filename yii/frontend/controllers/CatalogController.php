<?php

namespace frontend\controllers;

use frontend\models\Catalog;

class CatalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
	    $this->layout = 'cataloglayout';		
		 return $this->render('index');
		
    }
	
	 public function actionView($id)
    {
	    $this->layout = 'cataloglayoutview';
		
		 return $this->render('view', [
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
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
