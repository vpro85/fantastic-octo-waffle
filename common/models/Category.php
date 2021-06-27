<?php


namespace common\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function rules()
    {
        return [
          [['parent_id'], 'integer'],
          [['name'], 'required'],
          [['name', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    public static function tableName()
    {
        return 'category'; //
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class(), ['category_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

}