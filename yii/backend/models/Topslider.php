<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


/**
 * This is the model class for table "topslider".
 *
 * @property integer $id
 * @property string $image
 * @property integer $status
 * @property string $stitle
 */
class Topslider extends \yii\db\ActiveRecord
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
        return 'topslider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		    [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['image', 'stitle'], 'required'],
            [['status'], 'integer'],
            [['image', 'stitle'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageurl' => 'Расположение',
            'status' => 'Статус',
            'stitle' => 'Заголовок',
			'file' => 'Изображение',
        ];
    }
}
