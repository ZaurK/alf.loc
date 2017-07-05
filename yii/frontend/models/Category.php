<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $stitle
 * @property string $sdescription
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parent', 'status'], 'integer'],
            [['ctitle', 'cdescription', 'status'], 'required'],
            [['cdescription'], 'string'],
            [['ctitle'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Id Parent',
            'ctitle' => 'Stitle',
            'cdescription' => 'Sdescription',
            'ctatus' => 'Status',
        ];
    }
	
}
