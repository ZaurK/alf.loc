<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $dt
 * @property string $title
 * @property string $text
 * @property integer $public
 * @property string $m_title
 * @property string $m_keywords
 * @property string $m_description
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt', 'title', 'text', 'public', 'm_title', 'm_keywords', 'm_description'], 'required'],
            [['dt'], 'safe'],
            [['text'], 'string'],
            [['public'], 'integer'],
            [['title', 'm_title', 'm_keywords', 'm_description'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt' => 'Дата',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'public' => 'Опубликовано',
            'm_title' => 'M Title',
            'm_keywords' => 'M Keywords',
            'm_description' => 'M Description',
        ];
    }
}
