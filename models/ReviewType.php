<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class ReviewType
 * @property $id
 * @property $name
 */
class ReviewType extends ActiveRecord
{
    public static function getList()
    {
        $list = [];
        foreach (self::find()->all() as $item) {
            $list[$item->id] = $item->name;
        }

        return $list;
    }
}
