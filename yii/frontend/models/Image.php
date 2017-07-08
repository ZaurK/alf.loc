<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $id_production
 * @property string $imagePath
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
            [['id_production', 'imagePath'], 'required'],
            [['id_production'], 'integer'],
            [['imagePath'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_production' => 'Id Production',
            'imagePath' => 'Image Path',
        ];
    }
}
