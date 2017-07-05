<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Signup form
 */
class SearchForm extends Model
{
    public $q;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['q', 'string'],

        ];
    }

   
}
