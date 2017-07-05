<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $ctitle
 * @property string $cdescription
 * @property string $created_at
 *
 * @property Good[] $goods
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
            [['ctitle'], 'required'],
            [['cdescription'], 'string'],
            [['created_at'], 'safe'],
            [['ctitle'], 'string', 'max' => 255],
            [['ctitle'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ctitle' => 'Заголовок',
            'cdescription' => 'Описание',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['catalog_id' => 'id']);
    }
}
