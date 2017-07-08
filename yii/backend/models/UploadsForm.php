<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\Point;


class UploadsForm extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
	public $id_production;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload($imageName)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@uploads') . '/images/' . $imageName . '.' . $this->imageFile->extension);
			
			//saving thumbnail
            $dirfrom = Yii::getAlias('@uploads') . '/images/';
            $dirto = Yii::getAlias('@uploads')  . '/images/thumbs/';
			$sourceImage = Image::getImagine()->open($dirfrom . $imageName. '.' .$this->imageFile->extension);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$newParam = min($origWidth, $origHeight);
			$size = new Box($newParam, $newParam);
			if($origWidth > $origHeight){ 
			    $x = $origWidth/4;
			    $point = new Point($x, 0);
			    }else {
			        $point = new Point(0, 0);
					}
                    $sourceImage->crop($point, $size)
			    ->thumbnail($size)
                ->save($dirto . $imageName.'.'.$this->imageFile->extension, ['quality' => 90]);
			
            return true;
        } else {
            return false;
        }
    }
}
