<?php

namespace frontend\controllers;
use Yii;
use common\models\Good;


class GoodController extends \yii\web\Controller
{
    public function actionIndex()
    {
	     $this->layout = 'goodlayout';	
        return $this->render('index');
    }

	 /**
     * Displays a single Good model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	     $this->layout = 'goodlayout';	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	  /**
     * Finds the Good model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Good the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Good::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
