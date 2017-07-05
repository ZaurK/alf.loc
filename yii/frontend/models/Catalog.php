<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $stitle
 * @property string $sdescription
 * @property integer $status
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
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
            'stitle' => 'Stitle',
            'sdescription' => 'Sdescription',
            'status' => 'Status',
        ];
    }
	
}
