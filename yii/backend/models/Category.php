<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $ctitle
 * @property string $cdescription
 * @property integer $status
 * @property string $ccolor
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
            [['ctitle', 'status'], 'required'],
            [['cdescription'], 'string'],
            [['ctitle', 'ccolor'], 'string', 'max' => 256],
			[['id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Чему принадлежит',
            'ctitle' => 'Заголовок',
            'cdescription' => 'Описание',
            'status' => 'Статус',
			'ccolor' => 'Цвет фона заголовка (будет виден только для верхнего уровня)',
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_parent']);
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductions()
    {
        return $this->hasMany(Production::className(), ['id_category' => 'id']);
    }
	
	public static function getStatusList()
	{
	     return ['Скрыто', 'Видно'];
	}
	
	public function getStatusName()
	{
	     $list = self::getStatusList();
		 return $list[$this->status];
	}
	
}
