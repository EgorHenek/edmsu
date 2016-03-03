<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SearchForm is the model behind the login form.
 */
class SearchForm extends Model
{
    public $string;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['string'], 'required'],
            // rememberMe must be a boolean value
            [['string'], 'string'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'string' => 'Текст запроса'
        ];
    }
}
