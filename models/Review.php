<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class Review
 * @property $id
 * @property $name
 * @property $type_id
 * @property $text
 */
class Review extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function tableName()
    {
        return 'reviews';
    }

    public function rules()
    {
        return [
            [['text', 'type_id'], 'required'],
            [['name'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'text' => 'Текст',
            'type_id' => 'Тип обращения',
        ];
    }
}
