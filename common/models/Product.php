<?php


namespace common\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product'; //
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class(), ['id' => 'category_id']);
    }

    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
        ];
    }

}