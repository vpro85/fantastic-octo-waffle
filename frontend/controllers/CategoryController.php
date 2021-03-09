<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta("Shop");
        return $this->render('index', compact('hits'));
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category))
            throw new HttpException(404, 'Category not found');
        $query = Product::find()->where(['category_id' => $id]);
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $products = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        $this->setMeta('Shop | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact(['products', 'pagination', 'category']));
    }
}
