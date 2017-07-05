<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "production".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $ptitle
 * @property string $pdescription
 * @property string $image
 * @property integer $promo
 *
 * @property Catalog $catalog
 */
class Production extends \yii\db\ActiveRecord
{
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
            [['id_category', 'ptitle', 'image', 'promo'], 'required'],
            [['id_category', 'promo'], 'integer'],
            [['pdescription', 'image'], 'string'],
            [['ptitle'], 'string', 'max' => 255],
            [['ptitle'], 'unique'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Production::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Catalog ID',
            'ptitle' => 'Gtitle',
            'pdescription' => 'Gdescription',
            'image' => 'Image',
            'promo' => 'Promo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
}
