<?php

namespace backend\models;

use Yii;
use common\models\Catalog;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $stitle
 * @property string $sdescription
 * @property integer $status
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stitle', 'status'], 'required'],
            [['id_parent', 'status', 'id_catalog'], 'integer'],
            [['sdescription'], 'string'],
            [['stitle','scolor'], 'string', 'max' => 256],
			[['id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id_parent' => 'id']],
			[['id_catalog'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['id_catalog' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Кому принадлежит',
            'stitle' => 'Заголовок',
            'scolor' => 'Цвет фона заголовка (будет виден только для верхнего уровня)',
            'sdescription' => 'Описание',
            'status' => 'Статус',
			'id_catalog' => 'Прикрепленный альбом',
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'id_parent']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'id_catalog']);
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
