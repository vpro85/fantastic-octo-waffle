<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\Controller;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if(empty($product))
            throw new HttpException(404, 'This Product not found.');
        return $this->render('view', compact('product'));
    }

}
