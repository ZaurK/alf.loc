<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "good".
 *
 * @property integer $id
 * @property integer $catalog_id
 * @property string $gtitle
 * @property string $gdescription
 *
 * @property Catalog $catalog
 */
class Good extends \yii\db\ActiveRecord
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
        return 'good';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['catalog_id', 'gtitle'], 'required'],
            [['catalog_id', 'promo'], 'integer'],
            [['gdescription', 'image'], 'string'],
            [['gtitle', 'image'], 'string', 'max' => 255],
            [['gtitle'], 'unique'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'catalog.ctitle' => 'Каталог',
            'catalog_id' =>'Альбом',
            'gtitle' => 'Заголовок',
            'gdescription' => 'Описание',
            'image' => 'Изображение',
            'file' => 'Изображение',
            'promo' => 'Видимость на главной',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }
}