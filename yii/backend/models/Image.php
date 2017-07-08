<?php

namespace backend\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $ptitle
 * @property string $pdescription
 * @property string $image
 * @property integer $promo
 */
class Image extends \yii\db\ActiveRecord
{
    
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		   
            [['id_production'], 'required'],
            [['id_production'], 'integer'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_production' => 'Продукция',
           
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduction()
    {
        return $this->hasOne(Production::className(), ['id' => 'id_production']);
    }
}
