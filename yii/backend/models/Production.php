<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "production".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $ptitle
 * @property string $pdescription
 * @property string $image
 * @property integer $promo
 */
class Production extends \yii\db\ActiveRecord
{
     /**
     * @var UploadedFile
     */
    public $file;
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'production';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ptitle'], 'required'],
            [['id_category', 'promo'], 'integer'],
            [['pdescription', 'pprice'], 'string'],
            [['ptitle', 'pprice'], 'string', 'max' => 256],
			[['ptitle'], 'unique'],
			[['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Категория',
            'ptitle' => 'Заголовок',
            'pdescription' => 'Описание',
			'pprice' => 'Цена',
            //'file' => 'Изображение',
            //'image' => 'Изображение',
            'promo' => 'В блок лучших работ',
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasMany(Image::className(), ['id_production' => 'id']);
    }
}
